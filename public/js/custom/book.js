$(document).ready(function () {

    let favCount = $('#nav__fav-count').data('fav-count');

/*    $(document).on('click', '.book__fav-icon', function () {
        alert('test');
      //  let url = $(this).data('url');
     //   let bookId = $(this).data('book-id');
     //   let isFavored = $(this).hasClass('icon-heart');

     //   toggleFavorite(url, bookId, isFavored);

    });//end of on click fav icon*/

    $(document).on('click', '.book__fav-btn', function () {
       // alert('test');
        let url = $(this).find('.book__fav-icon').data('url');
        let bookId = $(this).find('.book__fav-icon').data('book-id');
        let isFavored = $(this).find('.book__fav-icon').hasClass('icon-heart');

        toggleFavorite(url, bookId, isFavored);

    });//end of on click fav icon

    function toggleFavorite(url, bookId, isFavored) {
       // alert(url);
        !isFavored ? favCount++ : favCount--;
        favCount > 9 ? $('#nav__fav-count').html('9+') : $('#nav__fav-count').html(favCount);


        $('.book-' + bookId).toggleClass('icon-heart');


        // to remove books from favorite page when click unfavored book
        if ($('.book-' + bookId).closest('.favorite').length) {

            $('.book-' + bookId).closest('.book').remove();

        }//end of if

       /* $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });*/

        $.ajax({
            url: url,
            method: 'POST',
            headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}

        });//end of ajax call

    }

});//end of document ready

