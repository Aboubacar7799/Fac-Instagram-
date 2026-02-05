<?php
    namespace App\MonService;
    use PHPMailer\PHPMailer\PHPMailer;

    class EmailService{
        protected $app_name;
        protected $host;
        protected $port;
        protected $username;
        protected $password;

        function __construct(){
            $this->app_name = config('app.name');
            $this->host = config('app.email_host');
            $this->port = config('app.email_port');
            $this->username = config('app.email_username');
            $this->password = config('app.email_password');
        }

        //cette fonction nous permet d'envoyer l'email à user
        public function envoiEmail($sujet,$emailUser,$nameUser,$isHtml,$activation_code,$activation_token){
            $mail = new PHPMailer;
            try {
                $mail->isSMTP();
                $mail->SMTPDebug = 0;
                $mail->Host = $this->host;
                $mail->Port = $this->port;
                $mail->Username = $this->username;
                $mail->Password = $this->password;
                $mail->SMTPAuth = true;
                $mail->Subject = $sujet;
                $mail->setFrom($this->app_name,'Wiz Fobic le Codeur');
                $mail->addReplyTo($this->app_name,$this->app_name);
                $mail->addAddress($emailUser,$nameUser);
                $mail->isHTML($isHtml);
                $mail->Body = $this->viewSendEmail($nameUser,$activation_code,$activation_token);
                $mail->send();
            } catch (Exception $e) {
                echo "Impossible d'envoyer le mail. Error: {$mail->ErrorInfo}";
            }
        }

        //celle-là nous permet de retourner la page confirmation_email
        public function viewSendEmail($name,$activation_code,$activation_token){
                return view('mail.confirmation_email')
                        ->with([
                        'name'=>$name,
                        'activation_code'=>$activation_code,
                        'activation_token'=>$activation_token,
                        ]);
        }

        //cette fonction nous permet d'envoyer l'email à user pour iniatiliser son mot de passe
        public function initialPassword($sujet,$emailUser,$nameUser,$isHtml,$activation_token){
            $mail = new PHPMailer;
            try {
                $mail->isSMTP();
                $mail->SMTPDebug = 0;
                $mail->Host = $this->host;
                $mail->Port = $this->port;
                $mail->Username = $this->username;
                $mail->Password = $this->password;
                $mail->SMTPAuth = true;
                $mail->Subject = $sujet;
                $mail->setFrom($this->app_name,'Wiz Fobic le Codeur');
                $mail->addReplyTo($this->app_name,$this->app_name);
                $mail->addAddress($emailUser,$nameUser);
                $mail->isHTML($isHtml);
                $mail->Body = $this->viewInitialPwd($nameUser,$activation_token);
                $mail->send();
            } catch (Exception $e) {
                echo "Impossible d'envoyer le mail. Error: {$mail->ErrorInfo}";
            }
        }

        //celle-là nous permet de retourner la page confirmation_email
        public function viewInitialPwd($name,$activation_token){
            return view('mail.initial_pwd')
                        ->with([
                        'name'=>$name,
                        'activation_token'=>$activation_token,
                        ]);
        }
    }
?>
