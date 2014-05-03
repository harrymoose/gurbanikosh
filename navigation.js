var menu = document.getElementById('menu-01'),
    showLeftPush = document.getElementById('showLeftPush'),
    body = document.body;

showLeftPush.onclick = function() {
   classie.toggle( this, 'active');
   classie.toggle( body, 'menu-push-toright');
   classie.toggle( menu, 'menu-open');
   disableOther('showLeftPush');
}

function disableOther( button ){
   if (button !== showLeftPush){
      classie.toggle(showLeftPush, 'disabled');
   }
}
