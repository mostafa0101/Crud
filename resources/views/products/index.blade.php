<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Products</title>
</head>
    <body>
    <h1>Products</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
        <div>
            <table border="5" class="table table-dark table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($products as $pr)
                    <tr>
                        <td>{{$pr->id}}</td>
                        <td>{{$pr->name}}</td>
                        <td>{{$pr->qty}}</td>
                        <td>{{$pr->price}}</td>
                        <td>{{$pr->description}}</td>

                        <td>
                            <a href="{{route('product.edit',$pr)}}">Edit</a>
                        </td>

                        <td>
                            <form method="post" action="{{route('product.destroy',$pr)}}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success btn-lg">
                    <a href="{{route('product.create')}}">ADD</a>
                </button>
                <form method="post" action="{{route('product.clear')}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-lg">Clear Data</button>
                </form>
            </div>
        </div>
    </body>
</html>
