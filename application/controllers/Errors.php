<?php

// Error controller
// This controller is used to manage the errors (404)
class Errors extends CI_Controller 
{

    // Main controller for the contact form
    public function error404()
    {
        // Create your custom controller

        // Display page
        $this->load->view('errors/custom/page404');
    }
}