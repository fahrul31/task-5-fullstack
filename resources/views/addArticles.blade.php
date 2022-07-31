@extends('layouts.main')

@section('container')

<section>
<h1 class="text-center">Add Articles</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="exampleInputEmail1"
                                class="form-label">Categories ID</label>
                            <select class="form-select" id="categories_id" name="categories_id" aria-label="Floating label select example">
                                <option selected></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1"
                                class="form-label">Title</label>
                            <input type="text" name="title" class="form-control"
                                id="title"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1"
                                class="form-label">Content</label>
                            <input type="text" name="content" class="form-control"
                                id="content"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1"
                                class="form-label">image</label>
                            <input class="form-control" type="file" name="image" id="image">
                        </div>
                        <button type="submit"
                            class="btn btn-primary" onclick=addArticles()>Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const token = JSON.parse(localStorage.getItem("token"));
        fetch('http://127.0.0.1:8000/api/all_categories',{
            method: 'GET',
            headers : new Headers({
                'Authorization': 'Bearer ' +token,
                'Content-Type': 'application/json; charset=UTF-8',
            })
        })
        .then((response) => response.json())
        .then((data) => {
            let output = '';
            data = data.data;
            data.forEach(function(categories){
                output += `
                    <option value="${categories.id}">${categories.name}</option>
                `;
            })
            document.getElementById('categories_id').innerHTML = output;
        })
        .catch((err) => console.log(err));

        function addArticles() {
            fetch('http://127.0.0.1:8000/api/insert_articles',{
            method: 'POST',
            headers : new Headers({
                    'Authorization': 'Bearer ' +token,
                    'Content-Type': 'application/json; charset=UTF-8',
                }),
            body: JSON.stringify({
                'categories_id' : document.getElementById("categories_id").value,
                'title' : document.getElementById("title").value,
                'content' : document.getElementById("content").value,
                'image' : document.getElementById("image").value,
            }),
            })
            .then((response) => response.json())
            .then((data) => {
                location.reload();
            })
            .catch((err) => console.log(err));
        }
    </script>
</section>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous">
    </script>
    

@endsection