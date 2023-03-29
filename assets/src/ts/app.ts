document.addEventListener('DOMContentLoaded', () => {
	
	'use strict';
	
	// Code like commit history doesn't exists...
	
	// Ts version of a func.
	testTsFunc( 'Dave' );
});

// TS version of the func.
const testTsFunc = ( name: string ) : void => {
	console.log( `Hi ${name}, this is a message!` );
};

