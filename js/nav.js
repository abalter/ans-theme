
$ = window.jQuery;

//$nav = $('#main-menu');

//$('.menu-toggle').attr('style','');

$nav = $('.menu');

if ($(window).width() < 768)
{
  console.log("window mobile");
  $nav.removeClass('row-menu');
  $nav.removeClass('column-menu-visible');
  $nav.addClass('column-menu-hidden');
}
else
{
  console.log("window normal");
  $nav.addClass('row-menu')
  $nav.removeClass('column-menu-visible');
  $nav.removeClass('column-menu-hidden');
}


$('.menu-toggle').on('click', function()
{
  console.log("toggle");
  
  if ($nav.is(':visible'))
  {
    $nav.removeClass('row-menu');
    $nav.addClass('column-menu-hidden');
    $nav.removeClass('column-menu-visible');
  }
  else
  {
    $nav.removeClass('row-menu');
    $nav.addClass('column-menu-visible');
    $nav.removeClass('column-menu-hidden');
  }

  displayNavProperties($nav);
  console.log("done with toggle");
});

$('.menu-item a').on('click', function(e)
{
  console.log("a clicked");
  if ($(window).width() < 768)
  {
    console.log('mobile size');
    $nav.addClass('column-menu-hidden');
    $nav.removeClass('column-menu-visible');
    dislpayNavProperties($nav);
  }
  console.log('done handling click');
  displayNavProperties($nav);
});

$(window).resize(function()
{
  console.log("resize to " + $(window).width());
  if ($(window).width() < 768)
  {
    console.log("window mobile");
    $nav.removeClass('row-menu');
    $nav.removeClass('column-menu-visible');
    $nav.addClass('column-menu-hidden');
  }
  else
  {
    console.log("window normal");
    $nav.addClass('row-menu')
    $nav.removeClass('column-menu-visible');
    $nav.removeClass('column-menu-hidden');
  }

  displayNavProperties($nav);
});

function displayNavProperties(nav)
{
  $nav = $(nav);
  console.log("class: " + $nav.attr('class'));
  console.log("display: " + $nav.css('display'));
  console.log("flex-direction: " + $nav.css('flex-direction'));
}