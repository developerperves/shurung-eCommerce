
    $(document).on('click', '.wishlist_store', function (e) {
        e.preventDefault();
        let wishlist_url = $(this).attr('href');
        $.get(wishlist_url, function (response) {
            console.log(response.status);
            if (response.status == 0) {
                location.href = response.link;
            } else if (response.status == 2) {
                dangerNotification(response.message);
            } else {
                $('.wishlist1').addClass('d-none');
                $('.wishlist2').removeClass('d-none');
                $('.wishlist_count').text(response.count)
                $('.colorChange').css({'background-color': '#FF6363', 'color': 'white'});
                // successNotification(response.message);
            }
        })
    });




     