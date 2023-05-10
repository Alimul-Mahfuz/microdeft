<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <hr>
        @if (session('msg'))
            {{-- <span class="alert">{{}}</span> --}}
        @endif
        <h5>Add Appointment</h5>
        <form action="{{ route('doctor.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" value="{{ old('doctor_name') }}" name="doctor_name"
                    id="exampleFormControlInput1" placeholder="doctorname">
                @error('doctor_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" placeholder="" value="{{ old('doctor_image') }}"
                    name="doctor_image">
                @error('doctor_image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Phone Number" value="{{ old('phone_number') }}"
                    name="phone_number">
                @error('phone_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Appointment Fee"
                    value="{{ old('appointment_fee') }}" name="appointment_fee">
                @error('appointment_fee')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <!-- Button trigger modal -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#SL</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Appointment Fee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $key => $doctor)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $doctor->doctor_name }}</td>
                        <td>{{ $doctor->doctor_image }}</td>
                        <td>{{ $doctor->phone_number }}</td>
                        <td>{{ $doctor->appointment_fee }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $doctor->id }}">
                                Edit
                            </button>
                            <a href="{{route('doctor.destroy',['id'=>$doctor->id])}}">
                                <button type="button" class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </a>
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModal{{ $doctor->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel{{ $doctor->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('doctor.update') }}" enctype="multipart/form-data"
                                        method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" hidden name="id" value="{{ $doctor->id }}"
                                                id="">
                                            <input type="text" class="form-control"
                                                value="{{ $doctor->doctor_name }}" name="doctor_name"
                                                id="exampleFormControlInput1" placeholder="doctorname">
                                            @error('doctor_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="file" class="form-control" placeholder=""
                                                value="{{ $doctor->doctor_doctor_image }}" name="doctor_image">
                                            @error('doctor_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Phone Number"
                                                value="{{ $doctor->phone_number }}" name="phone_number">
                                            @error('phone_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Appointment Fee"
                                                value="{{ $doctor->appointment_fee }}" name="appointment_fee">
                                            @error('appointment_fee')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
