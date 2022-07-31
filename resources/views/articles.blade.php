@extends('layouts.main')

@section('container')

<section>
    <h1 class="text-center">Data Articles</h1>
    <div class="container mb-2">
        <a href="/add_articles" type="button" class="btn btn-success">Tambah
            +</a>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">articles id</th>
                        <th scope="col">User id</th>
                        <th scope="col">Categories id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="output">
                

                    <script>
                        const token = JSON.parse(localStorage.getItem("token"));
                        console.log(token);
                        fetch('http://127.0.0.1:8000/api/all_articles',{
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
                            data.forEach(function(articles){
                                output += `
                                    <tr>
                                        <th scope="row">${articles.id}</th>
                                        <td>${articles.user_id}</td>
                                        <td>${articles.categories_id}</td>
                                        <td>${articles.title}</td>
                                        <td>${articles.content}</td>
                                        <td><img src="${articles.image}" style="width: 8em;"></td>
                                        <td><a href="/edit_articles/${articles.id}"><button class="btn btn-success mb-1">Edit</button></a>
                                        <button onclick="deleteArticles(${articles.id})" class="btn btn-danger mb-1">Delete</button>  
                                        </td>
                                        
                                    </tr>
                                `;
                            })
                            document.getElementById('output').innerHTML = output;
                        })
                        .catch((err) => console.log(err));


                        //delete
                        function deleteArticles(id) {
                            fetch('http://127.0.0.1:8000/api/delete_articles/' +id,{
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