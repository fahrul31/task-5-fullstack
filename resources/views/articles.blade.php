@extends('layouts.main')

@section('container')

<section>
    <h1 class="text-center">DATA Articles</h1>
    <div class="container mb-2">
        <a href="/" type="button" class="btn btn-success">Tambah
            +</a>
            <div class="row g-3 align-items-center mt-1">
                <div class="col-auto">
                <form action="/admin-customer" method="GET">
                  <input type="search" name='search' class="form-control" aria-describedby="passwordHelpInline">
                </form>
                </div>
              </div>
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

                        // kita gunakan fetch dalam kita ambil data sample.txt yang sudah kita buat
                        fetch('http://127.0.0.1:8000/api/all_articles',{
                            method: 'GET',
                            headers : new Headers({
                                'Authorization': 'Bearer ' +token,
                                'Content-Type': 'application/json; charset=UTF-8',
                            })
                        })
                        // kita buat response menjadi json
                        .then((response) => response.json())
                        // lalu data nya kita ambil dan kita masuken ke p id output
                        .then((data) => {
                            // kita buat variabel output 
                            let output = '';
                            // kita console.log agar mengetahui apakah data nya sudah masuk atau belum
                            console.log(data.data);
                            data = data.data;

                            // forEach ini adalah looping dan dinamakan user
                            data.forEach(function(articles){
                                // kita tambahkan output-nya jangan lupa gunakan backslash `` yang di sebelah angka nomer 1
                                // kita panggil id name email didapat dari users.json
                                console.log(articles);
                                output += `
                                    <tr>
                                        <th scope="row">${articles.id}</th>
                                        <td>${articles.user_id}</td>
                                        <td>${articles.categories_id}</td>
                                        <td>${articles.title}</td>
                                        <td>${articles.content}</td>
                                        <td>${articles.image}</td>
                                        <td></td>
                                        
                                    </tr>
                                `;
                            })
                            
                            // kita panggil id output agar bisa di tampilkan ke browser saat di klik
                            document.getElementById('output').innerHTML = output;
                        })
                        // membuat catch jadi kalau ada yang error langsung ketawan
                        .catch((err) => console.log(err));

                    </script>

                </tbody>
            </table>

        </div>
    </div>
</section>

@endsection