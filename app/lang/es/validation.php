<?php

return array(

	"alpha_num"            => "El :attribute sólo puede contener letras y números.",
	"digits"               => "El campo :attribute debe contener minimo :digits digitos.",
	"digits_between"       => "El campo :attribute debe contener minimo :min y maximo :max digitos.",
	"email"                => "El :attribute debe ser una dirección de correo electrónico válida.",
	"in"                   => "El campo :attribute selecionado no es válido.",
	"max"                  => array(
		"numeric" => "El campo :attribute no puede contener mas de :max digitos.",
		"file"    => "El :attribute no puede ser superior a :max kilobytes.",
		"string"  => "El :attribute no puede contener mas de :max caracteres.",
		"array"   => "The :attribute may not have more than :max items.",
	),
	"min"                  => array(
		"numeric" => "El :attribute no puede contener menos de :min digitos.",
		"file"    => "El :attribute no puede ser menor a :min kilobytes.",
		"string"  => "El :attribute no puede contener menos de :min caracteres.",
	),
	"numeric"              => "El :attribute solo acepta numero.",
	"required"             => "El campo :attribute es obligatorio.",
	"unique"               => ":attribute ya se encuentra registrado.",
	"url"                  => "El format de la url del campo :attribute es invalido.",
);
