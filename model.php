<?php 

class Account{

	// универсальная проверка данных форм на корректность
    public static function validate($inputs = [], $post){

        $rules = [
        	'login' => [
                'pattern' => '#^[\S]{2,}$#ui',
                'message' => 'Логин указан неверно! <br>(пробел запрещен и длина не менее 2 символов)',
            ],
            'name' => [
                'pattern' => '#^[\S]{2,}$#ui',
                'message' => 'Имя указано неверно! <br>(пробел запрещен и длина не менее 2 символов)',
            ],
            'email' => [
                'pattern' => '#^.+@.+$#',
                'message' => 'E-mail указан неверно! <br>(он должен содержать знак @, например, example@mail.ru)',
            ],
            'phone' => [
                'pattern' => '#^(\+)?(\d|\(|\)|\s|\-)*$#',
                'message' => 'Телефон указан неверно! номер не должен содержать букв)',
            ],
            'password' => [
                'pattern' => '#^[\S]{4,}$#ui',
                'message' => 'Пароль указан неверно! <br>(пробел запрещен и длина не менее 4 символов)',
            ],
            
        ];
        // проверка на пустоту и ошибки
        foreach ($inputs as $val){
            if(empty($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])){
                $message =  $rules[$val]['message'];
                exit(json_encode(['status' => 'Ошибка!', 'message' => $message]));
            }
        }
    }

    public static function comparePasswords($password, $password_copy){

    	if($password == $password_copy) 
            return true;
        return false;
    }

    // проверка сущесвуют ли данные пользователя в бд
    public static function checkDataExists($type, $data){

        $params = [
            $type => $data,
        ];
        $sql = 'SELECT user_id FROM users WHERE '.$type.'= :'.$type;
        if(Db::column($sql, $params)){
            return true;
        }
        return false;
    }


    public static function createUniqString($length) {
		return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', $length)), 0, $length);
	}

    public static function register($post){

    	$token = $this->createUniqString(30);
    	$params = [
    		'login' => $post['login'],
    		'name' => $post['name'],
    		'email' => $post['email'],
    		'phone' => $post['phone'],
    		'password' => password_hash($post['password'], PASSWORD_BCRYPT),
    		'token' => $token,
    		'status' => 0,
    	];
    	$sql = 'INSERT INTO users (name , login, email, phone, password, token, status) 
                VALUES( :name, :login, :email, :phone, :password, :token, :status)';
    	Db::query($sql, $params);
        $_SESSION['user'] = $params;

        $title = 'Регистрация на https://lenar2.000webhostapp.com';
        $msg = 'Здравсвуйте, '.ucfirst($post['name']).'<br>'
                .'для подтверждения регистрации на сайте https://lenar2.000webhostapp.com'.'<br>'
                .'перейдите по ссылке: '.'<br>'
                .'https://'.$_SERVER['HTTP_HOST'].'/account/confirm/?token='.$token;
        Mail::sendMail($post['email'], $title, $msg);
    }

    public static function autoRegister($post){

        $login = preg_replace('$[-\+\(\) ]$', '', $post['phone']);
        $password = $this->createUniqString(8);
        $token = $this->createUniqString(30);
        $params = [
            'login' => $login,
            'name' => $post['name'],
            'email' => $post['email'],
            'phone' => $post['phone'],
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'token' => $token,
            'status' => 1,
        ];
        $sql = 'INSERT INTO users (name , login, email, phone, password, token, status) 
                VALUES( :name, :login, :email, :phone, :password, :token, :status)';
        Db::query($sql, $params);
        $_SESSION['user'] = $params;
    }


    // активация аккаунта по ранее отправленной ссылке в почту
    public static function activate($token){

    	$params = [
    		'token' => $token,
    	];
    	$sql = 'UPDATE users SET status = 1, token = "" WHERE token = :token';
    	Db::query($sql, $params);
    }

    // проверка данных на корректность при входе в систему, сверка хэша пароля
    public static function checkData($login, $password){

        $params = [
            'login' => $login,
        ];
        $sql = 'SELECT pass FROM users WHERE login = :login';
        $hash = Db::column($sql, $params);
        if(!$hash or !password_verify($password, $hash)){
            return false;
        }
        return true;
    }

    // проверка - активирован ли аккаунт
    public static function checkStatus($type, $data){

        $params = [
            $type => $data,
        ];
        $sql = 'SELECT status FROM users WHERE '.$type.'= :'.$type;
        $status = Db::column($sql, $params);
        if($status == 1){
            return true;
        }
        return false;
    }

    // пользователь выполняет вход - сохраняем его данные в сессии
    public static function login($login) {
        $params = [
            'login' => $login,
        ];
        $data = Db::rowOne('SELECT * FROM users WHERE login = :login', $params);
        $_SESSION['user'] = 'yes';
    }

    // восстановление аккаунта по почте и отправка ссылки для восстановления на нее
    public static function recovery($email){

        // проверяем - были ли данные для восстановления уже были отправлены на почту
        $params = [
            'email' => $email,
        ];

        $sql = 'SELECT token FROM users WHERE email = :email';
        $token = Db::column($sql, $params);
        if($token) return false;

        // если нет
        $token = $this->createUniqString(30);
        $params = [
            'token' => $token,
            'email' => $email,
        ];
        $sql = 'UPDATE users SET token = :token WHERE email = :email';
        Db::query($sql, $params);
        mail($email, 'Восстановление аккаунта на https://lenar2.000webhostapp.com', 'Confirm: '.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/renew/?token='.$token);
        return true;
        
    }

    // сброс пароля пользователя в бд
    public static function reset($token, $password){

        $params = [
            'token' => $token,
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ];
        Db::query('UPDATE users SET token = "", password = :password WHERE token = :token', $params);
    }

    // уведомления о событиях аккаунта
    public static function notice($type){

        $rules = [
            'noemail' => 'Вы успешно зарегистрированы,<br> осталось подтвердить e-mail',
            'reg' => 'Поздравляем! Регистрация завершена',
            'unsubscribe' => 'Вы успешно отписались от рассылки',
            'pass' => 'Пароль успешно сброшен',
        ];

        foreach ($rules as $typePattern => $notice) {
            if($typePattern == $type)
                return $notice;
        }
    }


}