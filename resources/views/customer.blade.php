<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Add Edit Delete</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="py-12 mb-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Input Data</div>
                        <div class="card-body">
                            <form action="{{route('updateCustomer')}}" method="post">
                                @csrf
                                @if(session("success"))
                                    <div class="alert alert-success">{{session('success')}}</div>
                                @endif
                                <input type="hidden" name="id" id="id" value="">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-3 text-end">
                                            <label for="name" class="form-label ">Name</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                                        </div>
                                        <div class="col-3 text-end">
                                            @error('name')
                                                <div class=" text-center">
                                                    <span class="text-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-3 text-end">
                                            <label for="email" class="form-label">Email</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                                        </div>
                                        <div class="col-3 text-end">
                                            @error('email')
                                                <div class=" text-center">
                                                    <span class="text-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @if(old('gender')=='male')
                                    @php($malechk = 'checked')
                                    @php($femalechk = '')
                                @elseif(old('gender')=='female')
                                    @php($malechk = '')
                                    @php($femalechk = 'checked')
                                @else
                                    @php($malechk = '')
                                    @php($femalechk = '')
                                @endif
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-3 text-end">
                                            <label for="gender" class="form-label">Gender</label>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{$malechk}}>
                                                <label class="form-check-label" for="male">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{$femalechk}}>
                                                <label class="form-check-label" for="female">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-end">
                                            @error('gender')
                                                <div class=" text-center">
                                                    <span class="text-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @if(old('position')=='php')
                                    @php($phpchk = 'selected')
                                    @php($ioschk = '')
                                    @php($androidchk = '')
                                @elseif(old('position')=='ios')
                                    @php($phpchk = '')
                                    @php($ioschk = 'selected')
                                    @php($androidchk = '')
                                 @elseif(old('position')=='android')
                                    @php($phpchk = '')
                                    @php($ioschk = '')
                                    @php($androidchk = 'selected')
                                @else
                                    @php($phpchk = '')
                                    @php($ioschk = '')
                                    @php($androidchk = '')
                                @endif
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-3 text-end">
                                            <label for="position" class="form-label">Position</label>
                                        </div>
                                        <div class="col-6">
                                            <select name="position" id="position" class="form-select">
                                                <option {{$phpchk}} value="php">PHP</option>
                                                <option {{$ioschk}} value="ios">IOS</option>
                                                <option {{$androidchk}} value="android">Android</option>
                                            </select>
                                        </div>
                                        <div class="col-3 text-end">
                                            @error('position')
                                                <div class=" text-center">
                                                    <span class="text-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary ">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Result</div>
                        <div class="card-body">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Position</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach($customers as $customer)
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{ucfirst($customer->gender)}}</td>
                                        <td>{{strtoupper($customer->position)}}</td>
                                        <th><a style="cursor:pointer;" class="text-primary edit_customer" data-id="{{$customer->id}}">Edit</a></th>
                                        <th><a onclick="return confirm('Are you sure you want to delete this item?');" href="{{url('customer/softdelete/'.$customer->id)}}" class="text-danger delete_customer">Delete</a></th>
                                    </tr>
                                    @php($i++)
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script>
    var selection = document.querySelector('.alert') !== null;
    if (selection) {
        var alertList = document.querySelectorAll('.alert')
        var alerts =  [].slice.call(alertList).map(function (element) {
            return new bootstrap.Alert(element)
        })

        setTimeout(function() {  
            var alertNode = document.querySelector('.alert')
            var alert = bootstrap.Alert.getInstance(alertNode)
            alert.close()
        }, 1000);
    }

    document.querySelectorAll('.edit_customer').forEach((li) => {
    li.addEventListener('click', (event) => {
        const thisid = li.getAttribute("data-id");
        let url = 'api/customer/edit/'+thisid;
        fetch(url, {
            method: "GET",
            mode: 'no-cors', // no-cors, *cors, same-origin
            cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
            headers: {
                "Access-Control-Allow-Origin": "*",
                'Content-Type': 'application/x-www-form-urlencoded'
              },
            redirect: 'follow', // manual, *follow, error
            referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        })
        .then(response => response.json()) 
        .then(data => {
            (console.log(data));
            document.getElementById("id").value = data.enc_id;
            document.getElementById("name").value = data.name;
            document.getElementById("email").value = data.email;
            document.getElementById("position").value = data.position;
            if(data.gender=="female")
            {
                document.getElementById("female").checked = true;
            }
            else
            {
                document.getElementById("male").checked = true;
            }
        });
    });
});

</script>
</html>