@extends('front.template')

@section('content')
    <header class="category-header">
        <h1>{{$thisCategory->name}}</h1>
        <ul id="liste">
            <li onclick="choix(0)" id="0" class="liste active">Tous</li>
            @foreach($subCategories as $subCategory)
                <li class="liste" id="{{$subCategory->id}}" onclick="choix({{$subCategory->id}})">{{$subCategory->name}}</li>
            @endforeach
        </ul>
    </header>
    <div class="images-flex" id="images-elements">
        @foreach($images as $image)
            <div onclick="openImage(this)" data-title="{{$image->title}}" data-description="{{$image->description}}" data-price="{{$image->price}}" data-image="{{$image->url}}" data-category="{{$image->sub_category_id}}" class="category-image" style="background-image: url('../{{$image->url}}')"></div>
        @endforeach
    </div>

    <div class="image-bigger d-none" id="image-bigger">
        <img id="container-image" src="" alt="">
        <h2 id="container-h2">beu</h2>
        <p id="container-description"></p>
        <span id="container-price"></span>
        <i onclick="before()" class="fas fa-chevron-left next left"></i>
        <i onclick="after()" class="fas fa-chevron-right next right"></i>
    </div>

    <script>
        function before()
        {
            var image = document.getElementById('container-image');
            var allImages = document.getElementById('images-elements').querySelectorAll('.category-image');

            var count;
            var path;
            for(var i = 0; i < allImages.length; i++)
            {
                // console.log(allImages[i].dataset.image);
                if(allImages[i].dataset.image == image.dataset.image)
                {
                    if(i > 0)
                    {
                        count = i - 1;
                    }
                    else
                    {
                        count = i;
                    }
                }
            }
            image.src = "../" + allImages[count].dataset.image;
            image.dataset.image = allImages[count].dataset.image;
        }

        function after()
        {
            var image = document.getElementById('container-image');
            var allImages = document.getElementById('images-elements').querySelectorAll('.category-image');

            var count;
            var path;
            for(var i = 0; i < allImages.length; i++)
            {
                // console.log(allImages[i].dataset.image);
                if(allImages[i].dataset.image == image.dataset.image)
                {
                    if(i < allImages.length-1)
                    {
                        count = i + 1;
                    }
                    else
                    {
                        count = i;
                    }
                }
            }
            image.src = "../" + allImages[count].dataset.image;
            image.dataset.image = allImages[count].dataset.image;
        }

        function openImage(element)
        {
            opened = true;
            openMenu();

            var image = document.getElementById('container-image');
            image.src = "../" + element.dataset.image;
            image.dataset.image = element.dataset.image;

            var body = document.getElementById('body');
            body.style.overflow = "hidden";
        }

        function choix(category)
        {
            var elements = document.getElementById('images-elements').querySelectorAll(".category-image");

            if(category === 0)
            {

                for(var i = 0; i < elements.length; i++)
                {
                    elements[i].classList.remove('w-0');
                    elements[i].classList.remove('h-0');
                }
            }
            else
            {
                for(var i = 0; i < elements.length; i++)
                {
                    if(elements[i].dataset.category != category)
                    {
                        elements[i].classList.add('w-0');
                        elements[i].classList.add('h-0');
                    }
                    else
                    {
                        elements[i].classList.remove('w-0');
                        elements[i].classList.remove('h-0');
                    }
                }
            }

            var liste = document.getElementById('liste').querySelectorAll(".liste");

            for(var i of liste)
            {
                if(i.id == category)
                {
                    i.classList.add('active');
                }
                else
                {
                    i.classList.remove('active');
                }
            }

        }

        document.onkeydown = function(e) {
            switch(e.which) {
                case 37: // left
                    before();
                    break;
                case 39: // right
                    after();
                    break;
                default: return;
            }
            e.preventDefault();
        };

    </script>
@endsection