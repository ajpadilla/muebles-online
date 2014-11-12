@extends('layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h1 class="pagetitle nodesc">Adjuntar fotos al producto ({{ $nombre }})</h1>
	            </div>
	        </div>
	    </div>
	</div>
    <!-- MAIN CONTENT -->
    <div id="outermain">
        <div id="maincontainer">
            <div class="container">
                <div class="row">
                    <section id="maincontent">
                        <section id="empty" class="one columns positionleft"></section>
                        <section id="content" class="ten columns positionleft">
							<div id="actions" class="row">
								<div class="seven columns">
									<!-- The fileinput-button span is used to style the file input field as button -->
									<button id="addPhoto" class="btn btn-success fileinput-button dz-clickable">
										<i class="glyphicon glyphicon-plus"></i>
										<span>Agregar fotos...</span>
									</button>
									<button type="submit" class="btn btn-primary start">
										<i class="glyphicon glyphicon-upload"></i>
										<span>Iniciar</span>
									</button>
									<button type="reset" class="btn btn-warning cancel">
										<i class="glyphicon glyphicon-ban-circle"></i>
										<span>Cancelar</span>
									</button>
									{{--{{ Form::open(['route' => 'products.index', 'method' => 'get']) }}
										<button type="submit" href="{{ route('products.index') }}" class="btn-alert">
											<span>Lista de Productos</span>
										</button>
									{{ Form::close() }}--}}
								</div>
								<div class="five columns">
								<!-- The global file processing state -->
								<span class="fileupload-process">
								<div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
								<div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress=""></div>
								</div>
								</span>
								</div>
							</div>
							<section id="previews" class="row" class="files">
								<div id="template" class="row">
								<!-- This is used as the file preview template -->
									<div class="one columns">
									    <span class="preview"><img data-dz-thumbnail /></span>
									</div>
									<div class="four columns">
									    <p class="name" data-dz-name></p>
									    <strong class="error text-danger" data-dz-errormessage></strong>
									</div>
									<div class="two columns">
									    <p class="size" data-dz-size></p>
									    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
									      <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
									    </div>
									</div>
									<div class="four columns">
									  <button class="btn btn-primary start">
									      <i class="glyphicon glyphicon-upload"></i>
									      <span>Iniciar</span>
									  </button>
									  <button data-dz-remove class="btn btn-warning cancel">
									      <i class="glyphicon glyphicon-ban-circle"></i>
									      <span>Cancelar</span>
									  </button>
									  <button data-dz-remove class="btn btn-danger delete">
									    <i class="glyphicon glyphicon-trash"></i>
									    <span>Eliminar</span>
									  </button>
									</div>
								</div>
							</section>
                        </section><!-- content -->
                    </section>
                </div>
            </div>
        </div>
    </div>
        <!-- END MAIN CONTENT -->
@stop

@section('in-situ-js')
	<!-- Dropzone Includes -->
	<script src="{{ asset('js/vendor/dropzone.js') }}"></script>
@stop

@section('script')
	<script>
		var previewNode = document.querySelector("#template");
		previewNode.id = "";
		var previewTemplate = previewNode.parentNode.innerHTML;
		previewNode.parentNode.removeChild(previewNode);

		var myDropzone = new Dropzone(document.body, {
			url: "{{ route('photos.store') }}",
			thumbnailWidth: 80,
            thumbnailHeight: 80,
			addRemoveLinks: true,
			maxFilesize: 2,
			acceptedFiles: "image/*",
			previewTemplate: previewTemplate,
			autoQueue: false,
			previewsContainer: "#previews",
			clickable: '.fileinput-button'
        });

		myDropzone.on("addedfile", function(file) {
		  // Hookup the start button
		  file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
		});

		// Update the total progress bar
		myDropzone.on("totaluploadprogress", function(progress) {
		  document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
		});

		myDropzone.on("sending", function(file, xhr, formData) {
			formData.append('product_id', '{{ $productId }}');
		  // Show the total progress bar when upload starts
		  document.querySelector("#total-progress").style.opacity = "1";
		  // And disable the start button
		  file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
		});

		// Hide the total progress bar when nothing's uploading anymore
		myDropzone.on("queuecomplete", function(progress) {
		  document.querySelector("#total-progress").style.opacity = "0";
		});

		// Setup the buttons for all transfers
		// The "add files" button doesn't need to be setup because the config
		// `clickable` has already been specified.
		document.querySelector("#actions .start").onclick = function() {
		  myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
		};
		document.querySelector("#actions .cancel").onclick = function() {
		  myDropzone.removeAllFiles(true);
		};
	</script>
@stop