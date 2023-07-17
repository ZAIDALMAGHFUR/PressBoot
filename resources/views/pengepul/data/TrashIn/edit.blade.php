@extends('layouts.pengepul')
@section('content')

@pushOnce('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
@endPushOnce


<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>Edit Trash In</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Applications</a></li>
            <li class="breadcrumb-item">Data Master</li>
            <li class="breadcrumb-item active">Edit Trash In</li>
          </ol>
        </div>
        <div class="col-sm-6">
          <!-- Bookmark Start-->
          <div class="bookmark">
            <ul>
              <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top"
                  title="" data-original-title="Tables"><i data-feather="inbox"></i></a></li>
              <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top"
                  title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
              <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top"
                  title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
              <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top"
                  title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
              <li><a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                <form class="form-inline search-form">
                  <div class="form-group form-control-search">
                    <input type="text" placeholder="Search..">
                  </div>
                </form>
              </li>
            </ul>
          </div>
          <!-- Bookmark Ends-->
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <div class="col-lg-12">
              <div class="card p-3">
                <form method="post" class="needs-validation" novalidate="" action="{{ route('pengepul.trash-in.update', [$income]) }}">
                  @csrf
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif
                  <div class="row g-2">
                    <div class="col-md-6">
                      <label for="plastic_types_id" class="form-label">Plastic Type</label>
                      <div class="col-sm-10">
                        <select class="form-control js-example-basic-single col-sm-12" name="plastic_types_id" id="plastic_types_id">
                            <option value="{{ old('plastic_types_id', $income->plastic_types_id) }}">-- Select Plastic Type --</option>
                            @foreach($plasticTypes as $ps)
                                <option {{ old("plasticTypes") == $ps->id ? 'selected' : null }} value="{{ $ps->id }}">{{ $ps->plastic_type }}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control js-example-basic-single col-sm-12" name="status" id="status">
                            <option value="{{ old('status', $income->status) }}">-- Select Status --</option>
                            <option {{ old("status") == 'income' ? 'selected' : null }} value="income">Income</option>
                            <option {{ old("status") == 'expenditure' ? 'selected' : null }} value="expenditure">Expenditure</option>
                        </select>
                    </div>
                </div>
                  </div>
                  <div class="row g-2">
                    <div class="col-md-6">
                      <label for="weight" class="form-label">Weight</label>
                      <div class="col-sm-10">
                          <input type="number" class="form-control" name="weight" value="{{ old('weight', $income->weight) }}" id="weight" required>
                      </div>
                  </div>
                    <div class="col-md-6">
                      <label for="price" class="form-label">Price</label>
                      <div class="col-sm-10">
                          <input type="number" class="form-control" name="price" value="{{ old('price', $income->price) }}" id="price" required disabled readonly>
                      </div>
                  </div>

                  </div>

                  <button type="submit" class="btn btn-primary mt-3">Save</button>
              </form>
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@pushOnce('js')
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script>
        document.getElementById('weight').addEventListener('input', function() {
            var weight = this.value;
            var plasticTypeId = document.getElementById('plastic_types_id').value;
            if (weight && plasticTypeId) {
                fetch('/pengepul/getPrice?plastic_types_id=' + plasticTypeId + '&weight=' + weight)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('price').value = data;
                    });
            } else {
                document.getElementById('price').value = 0;
            }
        });
    </script>
@endpushOnce
@endsection
