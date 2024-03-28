<p id="text" class="mb-0 collapsed"> {{ $text }}</p>
<a id="moreBtn" href="#" class="btn btn-link" onclick="toggleText()">More</a>

<style>
    #text.collapsed {
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
    }
    </style>
    
    <script>
    function toggleText() {
      var text = document.getElementById('text');
      var moreBtn = document.getElementById('moreBtn');
    
      if (text.classList.contains('collapsed')) {
        text.classList.remove('collapsed');
        moreBtn.innerText = 'Less';
      } else {
        text.classList.add('collapsed');
        moreBtn.innerText = 'More';
      }
      return false;
    }
    </script>