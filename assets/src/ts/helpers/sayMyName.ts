/**
 * Console logs the users name.
 * @param name 
 */
const sayMyName = ( name: string ) : void => {
	console.log( `Your name is ${name}` );

	if ( 'Heisenberg' === name ) {
		console.log( 'You&apos;re god dam right!' );
	}
};

export default sayMyName;