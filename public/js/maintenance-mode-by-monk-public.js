(function( $ ) {
    //Coundown Scripts

    // Set the target date and time
    const targetDate = new Date('2024-01-01T12:00:00').getTime();

    // Update the countdown every 1 second
    const countdownInterval = setInterval(function() {
        const currentDate = new Date().getTime();
        const timeRemaining = targetDate - currentDate;
    
        if (timeRemaining <= 0) {
            clearInterval(countdownInterval); // Stop the countdown when the target time is reached
            document.getElementById('countdown').innerHTML = "Countdown expired!";
        } else {
            const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
    
            document.getElementById('countdown').innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
        }
    }, 1000);

    
})( jQuery );
