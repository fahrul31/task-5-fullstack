@extends('layouts.main')

@section('container')

<section>
    <h1 class="text-center">Data Categories</h1>
    <div class="container mb-2">
        <a href="/add_categories" type="button" class="btn btn-success">Tambah
            +</a>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">categories id</th>
                        <th scope="col">User id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="output">
                

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
                                console.log(categories);
                                output += `
                                    <tr>
                                        <th scope="row">${categories.id}</th>
                                        <td>${categories.user_id}</td>
                                        <td>${categories.name}</td>
                                        <td><a href="/edit_Categories/${categories.id}"><button class="btn btn-success mb-1">Edit</button></a>
                                            <button onclick="deleteCategories(${categories.id})" class="btn btn-danger mb-1">Delete</button>  </td>
                                    </tr>
                                `;
                            })
                            document.getElementById('output').innerHTML = output;
                        })
                        .catch((err) => console.log(err));

                        //delete
                        function deleteCategories(id) {
                            fetch('http://127.0.0.1:8000/api/delete_categories/' +id,{
                            method: 'DELETE',
                            headers : new Headers({
                                    'Authorization': 'Bearer ' +token,
                                    'Content-Type': 'application/json; charset=UTF-8',
                                })
                            })
                            .then((response) => response.json())
                            .then((data) => {
                                console.log(data);
                                location.reload();
                            })
                            .catch((err) => console.log(err));
                        }

                    </script>

                </tbody>
            </table>

        </div>
    </div>
</section>

@endsection