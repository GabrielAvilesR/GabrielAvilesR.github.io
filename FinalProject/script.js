// Define a new module for our app
var app = angular.module("instantSearch", []);

// Create the instant search filter

app.filter('searchFor', function(){

	// All filters must return a function. The first parameter
	// is the data that is to be filtered, and the second is an
	// argument that may be passed with a colon (searchFor:searchString)

	return function(arr, searchString){

		if(!searchString){
			return arr;
		}

		var result = [];

		searchString = searchString.toLowerCase();

		// Using the forEach helper method to loop through the array
		angular.forEach(arr, function(item){

			if(item.title.toLowerCase().indexOf(searchString) !== -1){
				result.push(item);
			}

		});

		return result;
	};

});

// The controller

function InstantSearchController($scope){

	// The data model. These items would normally be requested via AJAX,
	// but are hardcoded here for simplicity. See the next example for
	// tips on using AJAX.

	$scope.items = [
		{
			url: '#',
			title: 'HOSPITAL DE ESPECIALIDADES CATALINA: PABLO VALDEZ 719, OBLATOS BEATRIZ HERNANDEZ, GUADALAJARA, C.P 44360, JAL TEL: (33)3617-8652',
			image: 'http://nq6x602.preview.sasites.com.mx/img/upload/catalina1pao.jpg'
		},
		{
			url: '#',
			title: 'HOSPITAL SAN JAVIER: PABLO CASAL 640, PRADOS PROVIDENCIA, GUADALAJARA, C.P 44670, JAL TEL: (33)3669-0222',
			image: 'http://healthtravelguides.custhelp.com/rnt/rnw/img/enduser/Hospital-San_Javier_1.jpg'
		},
		{
			url: '#',
			title: 'CENTRO MEDICO PUERTA DE HIERRO: AV. EMPRESARIOS 150, PUERTA DE HIERRO, ZAPOPAN, C.P 45116, JAL TEL: (33)3848-4000',
			image: 'http://v4uidiv.preview.sasites.com.mx/img/upload/centro_medico_puerta_de_hierro1.jpg'
		},
		{
			url: '#',
			title: 'HOSPITAL REAL SAN JOSE: LAZARO CARDENAS 4149, JARDINES DE SAN IGNACIO, ZAPOPAN, C.P 45040, JAL TEL: (33)1078-8900',
			image: 'http://zapopan.goolocal.com.mx/sites/zapopan.goolocal.com.mx/files/imagecache/node_directorio/Hospital%20Real%20San%20Jose.jpg'
		},
		{
			url: '#',
			title: 'DIAGNOSIS CLINICA HOSPITAL: AV JUAREZ 199, CENTRO, SAN PEDRO TLAQUEPAQUE, C.P 45500, JAL TEL: (33)3639-9817',
			image: 'data:image/jpeg;base64,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'
		},
		{
			url: '#',
			title: 'HOSPITAL ROSETTE: CIRCUNVALACION DR ATL 487, INDEPENDENCIA ORIENTE, GUADALAJARA, C.P 44340, JAL TEL: (33)3637-2800',
			image: 'http://paginas.seccionamarilla.com.mx/img/upload/hospital-rosette_logo.jpg'
		},
		{
			url: '#',
			title: 'PABLO NERUDA HOSPITAL, S.A DE C.V: PABLO NERUDA 4150, VILLA UNIVERSITARIA, ZAPOPAN, C.P 45110, JAL TEL: (33)3610-0325',
			image: 'http://www.avissa.com.mx/Imgs/galeria06.jpg'
		}
	];


}
