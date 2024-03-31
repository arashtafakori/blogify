@if(!empty($text))
<p class="text mb-0 collapsed"> {{ $text }}</p>
@if(strlen($text) > 100)
<a href="#" class="btn btn-link" onclick="toggleText(this, event)">More</a>
@endif
@endif

<style>
  .text.collapsed {
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
  }
</style>


<script>
  function toggleText(btn, event) {
    event.preventDefault(); 
      var container = btn.parentNode.getElementsByClassName('text')[0];
      var moreBtn = btn;

      if (container.classList.contains('collapsed')) {
          container.classList.remove('collapsed');
          moreBtn.innerText = 'Less';
      } else {
          container.classList.add('collapsed');
          moreBtn.innerText = 'More';
      }
      return false;
  }

  // Get all the "More" buttons and attach click event listeners
  var moreButtons = document.querySelectorAll('.moreBtn');
  moreButtons.forEach(function(button) {
      button.addEventListener('click', function() {
          toggleText(this); // Pass the clicked button as an argument
      });
  });
</script>