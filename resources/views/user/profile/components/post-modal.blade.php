<style>
    .fade-in {
        opacity: 0;
        /* Initially hidden */
        transition: opacity 1.5s ease;
        /* Smooth transition */
    }

    .fade-in.show {
        opacity: 1;
        /* Visible */
    }

    .modal {
        display: none;
        position: fixed;
        transition: opacity 0.5s ease;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        border-radius: 13px;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    textarea.postContent {
        width: 100%;
        resize: none;
        overflow: auto
    }

    textarea.postContent:focus {
        outline: none;
    }
    form div.control button{
        background-color: dodgerblue;
        color: #fefefe;
        padding: 6px 12px;
        border-radius: 10px;
    }
    form div.control button:hover, form div.control button:focus{
        background-color: #0080ff;
    }
</style>
<div id="createPostModal" class="modal">
    <div class="modal-content" style="overflow: hidden">
        <span class="close">&times;</span>
        <form id="postForm" method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-control">
                <label for="postContent">Post Content:</label>
                <textarea id="postContent" class="postContent" name="description" rows="4" cols="50" required></textarea>
            </div>
            <div class="form-control">
                <label for="postImage">Upload Image:</label>
                <input type="file" id="postImage" name="image">
            </div>
            <div class="control">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>


<script>
    // Get the modal
var modal = document.getElementById("createPostModal");

// Get the button that opens the modal
var btn = document.getElementById("createPostButton");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
  document.body.style.overflow = "hidden"; // Prevent scrolling on the body
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  document.body.style.overflow = "auto"; // Allow scrolling on the body
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    document.body.style.overflow = "auto"; // Allow scrolling on the body
  }
}
</script>
