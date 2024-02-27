

function countLetter ( message ){
    message = message.trim()
    if( message === '') throw new Error("Empty message");

    return (
        [ ...message ].reduce((acc, curr ) => {
            acc[curr] = (acc[curr] || 0) + 1
        
            return acc ;
        }, {})
    )
}