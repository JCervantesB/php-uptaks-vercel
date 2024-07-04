<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use Dotenv\Dotenv as Dotenv;
$dotenv = Dotenv::createImmutable('../.env');
$dotenv->safeLoad();

class Email {

    public $nombre;
    public $email;
    public $token;

    public function __construct($nombre, $email, $token)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        // Crear el objeto de email
        $mail = new PHPMailer();

        // Configurar SMTP
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USER'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = 'tls';
        $mail->Port = $_ENV['MAIL_PORT'];

        // Contenido del email
        $mail->setFrom('cuentas@uptask.com', 'UpTask');
        $mail->addAddress($this->email);
        $mail->Subject = 'Confirma tu cuenta';

        // Habilitar HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<head>";
        $contenido .= "<style>";
        $contenido .= "body { font-family: 'Arial', sans-serif; margin: 0; display: flex; justify-content: center; padding: 2rem; background-color: #f0f0f0; text-align: center;}";
        $contenido .= ".contenedor { background-color: #fff; padding: 2rem; border-radius: 5px; }";
        $contenido .= "h1 { margin-bottom: 2rem; }";
        $contenido .= "p { color: #333; text-align: left; }";
        $contenido .= "a {";
        $contenido .= "   display: inline-block;";
        $contenido .= "   padding: 10px 20px;";
        $contenido .= "   background-color: #3498db;";
        $contenido .= "   color: #fff !important;";
        $contenido .= "   text-decoration: none;";
        $contenido .= "   font-weight: bold;";
        $contenido .= "   border-radius: 5px;";
        $contenido .= "   margin-bottom: 1rem;";
        $contenido .= "}";
        $contenido .= "a:visited { color: #fff !important; }";
        $contenido .= ".small { font-size: 0.8rem; color: #999; text-align: center; }";
        $contenido .= "</style>";
        $contenido .= "</head>";
        $contenido .= "<body>";
        $contenido .= "<div class='contenedor'>";
        $contenido .= "<h1>¡Bienvenido!</h1>";
        $contenido .= "<p>Hola <span style='color: #3498db;'>" . $this->nombre . "</span>,</p>";
        $contenido .= "<p>Gracias por crear tu cuenta en UpTask.</p>";
        $contenido .= "<p>Para confirmar tu cuenta, haz clic en el siguiente botón:</p>";
        $contenido .= "<a href='" . $_ENV['APP_URL'] . "/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>";
        $contenido .= "<br>";
        $contenido .= "<hr>";
        $contenido .= "<p class='small'>Si no solicitaste esta cuenta, puedes ignorar este mensaje.</p>";
        $contenido .= "</div>";
        $contenido .= "</body>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviamos el email
        $mail->send();
    }

    public function enviarInstrucciones() {
        // Crear el objeto de email
        $mail = new PHPMailer();

        // Configurar SMTP
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USER'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = 'tls';
        $mail->Port = $_ENV['MAIL_PORT'];

        // Contenido del email
        $mail->setFrom('cuentas@uptask.com', 'UpTask');
        $mail->addAddress($this->email);
        $mail->Subject = 'Reestablece tu cuenta';

        // Habilitar HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<head>";
        $contenido .= "<style>";
        $contenido .= "body { font-family: 'Arial', sans-serif; margin: 0; display: flex; justify-content: center; padding: 2rem; background-color: #f0f0f0; text-align: center;}";
        $contenido .= ".contenedor { background-color: #fff; padding: 2rem; border-radius: 5px; }";
        $contenido .= "h1 { margin-bottom: 2rem; }";
        $contenido .= "p { color: #333; text-align: left; }";
        $contenido .= "a {";
        $contenido .= "   display: inline-block;";
        $contenido .= "   padding: 10px 20px;";
        $contenido .= "   background-color: #3498db;";
        $contenido .= "   color: #fff !important;";
        $contenido .= "   text-decoration: none;";
        $contenido .= "   font-weight: bold;";
        $contenido .= "   border-radius: 5px;";
        $contenido .= "   margin-bottom: 1rem;";
        $contenido .= "}";
        $contenido .= "a:visited { color: #fff !important; }";
        $contenido .= ".small { font-size: 0.8rem; color: #999; text-align: center; }";
        $contenido .= "</style>";
        $contenido .= "</head>";
        $contenido .= "<body>";
        $contenido .= "<div class='contenedor'>";
        $contenido .= "<h1>¡Recuperar mi cuenta!</h1>";
        $contenido .= "<p>Hola <span style='color: #3498db;'>" . $this->nombre . "</span>,</p>";
        $contenido .= "<p>Haz solicitado reestablecer tu password de UpTask.</p>";
        $contenido .= "<p>Puedes hacerlo dando clic en el siguiente botón</p>";
        $contenido .= "<a href='" . $_ENV['APP_URL'] . "/recuperar?token=" . $this->token . "'>Reestablecer Password</a>";
        $contenido .= "<br>";
        $contenido .= "<hr>";
        $contenido .= "<p class='small'>Si no fuiste tú, puedes ignorar este mensaje.</p>";
        $contenido .= "</div>";
        $contenido .= "</body>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviamos el email
        $mail->send();
    }
}
