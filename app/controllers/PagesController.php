<?php

use Muebles\Forms\ContactForm;

class PagesController extends \BaseController {

	/**
	 * @var
	 */
	private $contactForm;

	/**
	 * @param ContactForm $contactForm
	 */
	function __construct(ContactForm $contactForm)
	{
		$this->contactForm = $contactForm;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function home()
	{
		Session::put('my.locale', 'es');
		return View::make('pages.home');
	}

	public function error404()
	{
		return View::make('errors.missing-404');
	}

	public function address(){
		return View::make('pages.address');
	}

	public function about(){
		return View::make('pages.about');
	}

	public function contactForm(){
		return View::make('pages.contact');
	}

	public function processContact(){
		$formData = Input::all();
		$this->contactForm->validate($formData);
		extract($formData);

		Mail::send('emails.contact-message', compact('formData'), function($message) use ($email, $nombre)
		{
			$message->to('web@grupo2.net', 'Grupo Dos S.L.')
			/*$message->to('nightzpy@gmail.com', 'Grupo Dos S.L.')*/
				->from($email, $nombre)
				->subject('Nuevo mensaje de contacto!');
		});

		Flash::message('Su mensaje ha sido enviado con éxito!');
		return Redirect::to('/');
	}
}
