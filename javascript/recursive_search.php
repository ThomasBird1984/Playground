<script>

var Person = {
    name: 'Thomas',
    birthday: '1984-12-04',
    descendents: [
        {
            name: 'Chris',
            birthday: '1984-07-27',
            descendents: [
                {
                    name: 'Sally',
                    birthday: '2000-07-27'
                },
                {
                    name: 'Stacy',
                    birthday: '2005-11-19'
                }
            ]
        },
        {
            name: 'Steve',
            birthday: '1990-03-19',
            descendents: [
                {
                    name: 'Christy',
                    birthday: '1964-07-27'
                },
                {
                    name: 'Michael',
                    birthday: '2009-11-19'
                }
            ]
        }
    ]
};

var global = {
    found: false,
    birthday: null
};

/**
 * Finds a property in an array of objects
 *
 * @param person
 * @param name
 * @param key
 * @returns {*}
 */
global.search = function( person, query, key ) {

	/**
	 * Define some default variables for use
	 */
    var result,
        objKeys = Object.keys( query ),
        keypassed = key ? key : false;

    // check to see if the specified person matches the key and value
    if( person[objKeys[0]].search( query[objKeys[0]] ) !== -1 ) {

    	// return the entire object if not key has been passed
        return keypassed ? person[keypassed] : person;

    } else {

    	// check to ensure that the specified object has a descendents property
        if( person.descendents ) {

        	// iterate through the persons descendents
            for( var i = 0; i < person.descendents.length; i++ ) {

            	//set the result of the search to a variable
                result = this.search( person.descendents[i], query, keypassed );

                // if the result is not false return the result
                if( result !== false ) {
                    return result;
                }
            }

            return false;
        } else {
            return false;
        }
    }
};

console.log( global.search( Person, { name: 'Steve' } ) );

</script>