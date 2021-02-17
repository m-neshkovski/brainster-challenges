@extends('layouts.layout')

@section('title', 'Post')

@section('header')
    @section('jumbutron')
        <div class="col-6 text-light">
            <h1 class="fw-bold pb-3">Man must explore, and this is exploration at it's greatest.</h1>
            <p class="fw-bold h6 text-white-dimm-50">Problems look mighty small from 150 miles up</p>
            <small class="text-white-dimm-50">Posted by Start Bootstrap on 17.02.2021</small>
        </div>
    @endsection
    @include('layouts.header')
@stop

@section('body')
    <div class="row">
        <div class="container">
            <div class="row py-3">
                <div class="col-4 offset-4 py-3">
                <p class="py-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore eaque beatae voluptatum modi! Quia molestiae repellendus odio officia assumenda. Id in, fugiat consequuntur tempora quis incidunt est ab commodi. Facere.</p>
                <p class="py-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore eaque beatae voluptatum modi! Quia molestiae repellendus odio officia assumenda. Id in, fugiat consequuntur tempora quis incidunt est ab commodi. Facere. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam architecto reiciendis quas. Nisi amet vel molestias fuga neque ut facilis in, obcaecati ducimus rem ratione dolores. Consequuntur inventore eum provident?</p>
                <p class="py-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore eaque beatae voluptatum modi! Quia molestiae repellendus odio officia assumenda. Id in, fugiat consequuntur tempora quis incidunt est ab commodi. Facere. Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda ea aut maiores laboriosam, expedita aliquid nihil, eveniet earum voluptatibus dolorum provident at quisquam, vitae consequuntur possimus officia. Dolores, praesentium quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, harum, pariatur in saepe suscipit numquam deserunt id enim eum ullam tenetur repudiandae vitae, voluptatibus ipsa vel tempora cupiditate labore maxime!</p>
                <p class="py-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore eaque beatae voluptatum modi! Quia molestiae repellendus odio officia assumenda. Id in, fugiat consequuntur tempora quis incidunt est ab commodi. Facere.</p>
                <p class="py-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore eaque beatae voluptatum modi! Quia molestiae repellendus odio officia assumenda. Id in, fugiat consequuntur tempora quis incidunt est ab commodi. Facere. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit perspiciatis minima iste, dolorem unde explicabo commodi culpa dolorum facilis nam excepturi, tempore eius quibusdam error omnis placeat repellat autem architecto!</p>
                <h3 class="fw-bold">The Final Frontier</h3>
                <p class="py-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore eaque beatae voluptatum modi! Quia molestiae repellendus odio officia assumenda. Id in, fugiat consequuntur tempora quis incidunt est ab commodi. Facere.</p>
                <p class="py-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore eaque beatae voluptatum modi! Quia molestiae repellendus odio officia assumenda. Id in, fugiat consequuntur tempora quis incidunt est ab commodi. Facere. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam architecto reiciendis quas. Nisi amet vel molestias fuga neque ut facilis in, obcaecati ducimus rem ratione dolores. Consequuntur inventore eum provident?</p>
                <p class="py-3 fst-italic">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore eaque beatae voluptatum modi! Quia molestiae repellendus odio officia assumenda. Id in, fugiat consequuntur tempora quis incidunt est ab commodi. Facere. Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda ea aut maiores laboriosam, expedita aliquid nihil, eveniet earum voluptatibus dolorum provident at quisquam, vitae consequuntur possimus officia. Dolores, praesentium quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, harum, pariatur in saepe suscipit numquam deserunt id enim eum ullam tenetur repudiandae vitae, voluptatibus ipsa vel tempora cupiditate labore maxime!</p>
                <p class="py-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore eaque beatae voluptatum modi! Quia molestiae repellendus odio officia assumenda. Id in, fugiat consequuntur tempora quis incidunt est ab commodi. Facere.</p>
                <p class="py-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore eaque beatae voluptatum modi! Quia molestiae repellendus odio officia assumenda. Id in, fugiat consequuntur tempora quis incidunt est ab commodi. Facere. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit perspiciatis minima iste, dolorem unde explicabo commodi culpa dolorum facilis nam excepturi, tempore eius quibusdam error omnis placeat repellat autem architecto!</p>
                <h3 class="fw-bold">Reching for the stars</h3>
                <p class="py-3 fst-italic">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore eaque beatae voluptatum modi! Quia molestiae repellendus odio officia assumenda. Id in, fugiat consequuntur tempora quis incidunt est ab commodi. Facere. Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda ea aut maiores laboriosam, expedita aliquid nihil, eveniet earum voluptatibus dolorum provident at quisquam, vitae consequuntur possimus officia. Dolores, praesentium quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, harum, pariatur in saepe suscipit numquam deserunt id enim eum ullam tenetur repudiandae vitae, voluptatibus ipsa vel tempora cupiditate labore maxime!</p>
                <div>
                    <figure class="figure">
                        <img class="figure-img img-fluid" src="{{ asset('/assets/img/post-sample-image.jpg') }}" alt="Astronout in space">
                        <figcaption class="figure-caption text-center fst-italic">Lorem ipsum dolor sit amet consectetur adipisicing elit.</figcaption>
                      </figure>
                </div>
                <p class="py-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore eaque beatae voluptatum modi! Quia molestiae repellendus odio officia assumenda. Id in, fugiat consequuntur tempora quis incidunt est ab commodi. Facere.</p>
                <p class="py-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore eaque beatae voluptatum modi! Quia molestiae repellendus odio officia assumenda. Id in, fugiat consequuntur tempora quis incidunt est ab commodi. Facere. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit perspiciatis minima iste, dolorem unde explicabo commodi culpa dolorum facilis nam excepturi, tempore eius quibusdam error omnis placeat repellat autem architecto!</p>

                <p>Id in, fugiat <a href="#" class="simple-link">consequuntur tempora</a> quis incidunt est ab commodi. <a href="#" class="simple-link">Facere.</a></p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    @include('layouts.footer')
@stop