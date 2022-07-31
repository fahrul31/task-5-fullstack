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
                                class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control"
                                id="name"
                                aria-describedby="emailHelp">
                        </div>
                        <button type="submit"
                            class="btn btn-primary" onclick=addCategories()>Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function addCategories() {
            const token = JSON.parse(localStorage.getItem("token"));
            fetch('http://127.0.0.1:8000/api/insert_categories',{
            method: 'POST',
            headers : new Headers({
                    'Authorization': 'Bearer ' +token,
                    'Content-Type': 'application/json; charset=UTF-8',
                }),
            body: JSON.stringify({
                'name' : document.getElementById("name").value,
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