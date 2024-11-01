<?php

/**
 * MELIBU PLUGIN ERROR CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/syntax-high-lighter
 * @package     Melibu Syntax High Lighter
 * @since       1.2
 */
if (!class_exists('MELIBU_PLUGIN_SYNTAX_ERRORS')) {
    
    /**
     * Class
     */
    class MELIBU_PLUGIN_SYNTAX_ERRORS {
        
        protected $mail = '';
        protected $title = '';
        protected $url = '';
        protected $version = '';
        protected $lang = '';

        /**
         *  Construct
         */
        public function __construct() {
            
            $this->action();
        }
        
        protected function action() {
            
            add_action('contact_send_message', array($this, 'contact_send_message'));
        }
        
        /**
         * 
         */
        public function contact_send_message() {

            $errors = false;

            // Get the posted data
            $this->mail = get_bloginfo("admin_email");
            $this->title = get_bloginfo("name");
            $this->url = get_bloginfo("url");
            $this->version = get_bloginfo("version");
            $this->lang = get_bloginfo("language");
            
            $error_message = get_bloginfo("message");

            // Write the email content
            $header .= "MIME-Version: 1.0\n";
            $header .= "Content-Type: text/html; charset=utf-8\n";
            $header .= "From:" . $this->mail;

            $message = "Website Title: $this->title \n";
            $message .= "Website Link: $this->url \n";
            $message .= "WP Version: $this->version \n";
            $message .= "WP Lang: $this->lang \n";
            $message .= "Message: \n $error_message";

            $subject = "MB Syntax - Error";
            $subject = "=?utf-8?B?" . base64_encode($subject) . "?=";

            $to = "2side@gmx.de";

            // Send the email using wp_mail()
            if (!wp_mail($to, $subject, $message, $header)) {
                $errors = true;
            }
        }

    }

}