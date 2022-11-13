

document.addEventListener("DOMContentLoaded", function()
{
    //resizer card
    items_menu = document.getElementsByClassName('resize-item');
    for (item_menu of items_menu)
    {
        item_menu.addEventListener("click", resizeCard, false);
    }
    //destroy card
    items_menu = document.getElementsByClassName('discard-item');
    for (item_menu of items_menu)
    {
        item_menu.addEventListener("click", destroyCard, false);
    }

});

function destroyCard(event)
{
    var card = event.currentTarget.closest('.container-card');
    card.remove();
}


function resizeCard(event)
{
    var card = event.currentTarget.closest('.container-card');
    var size = event.currentTarget.getAttribute('data-resize-container');
    switch (size) {
        case 's':
            card.classList.remove('w-50');
            card.classList.add('w-25');
          break;
        case 'm':
            card.classList.remove('w-25');
            card.classList.add('w-50');
          break;
        case 'l':
            card.classList.remove('w-25','w-50');
          break;
        default:
          break;
      }
      
}


