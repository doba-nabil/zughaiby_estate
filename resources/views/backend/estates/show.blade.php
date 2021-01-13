@extends('backend.layout.master')
@section('backend-head')
@endsection
@section('backend-main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $estate->name }}</h4>
                    <hr>
                    <div style="height: 200px" class="text-center">
                        @if(isset($estate->mainImage))
                            <img style="height: 100%;border-radius: 10px" alt="الصورة" src="{{ asset('pictures/estates/' . $estate->mainImage->file) }}"/>
                        @else
                            <img style="height: 100%;border-radius: 10px" alt="الصورة" src="{{ asset('backend/assets/images/empty.jpg') }}"/>
                        @endif
                    </div>
                    <hr>
                    <table class="table table-striped table-bordered dt-responsive nowrap">
                        <tr>
                            <th>الاسم</th>
                            <td>{{ $estate->name }}</td>
                        </tr>
                        <tr>
                            <th>العنوان</th>
                            <td>
                                {{ $estate->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>عدد الطوابق</th>
                            <td>{{ $estate->floors_count }}</td>
                        </tr>
                        <tr>
                            <th>عدد الشقق في الطابق</th>
                            <td>{{ $estate->apartments_count }}</td>
                        </tr>
                        <tr>
                            <th>عدد الشقق الخالية</th>
                            <td>{{ $estate->empty_apartments_count }}</td>
                        </tr>
                        <tr>
                            <th>عدد الشقق المأهولة</th>
                            <td>{{ $estate->rented_apartments_count }}</td>
                        </tr>
                        <tr>
                            <th>المدفوعات</th>
                            <td>{{ $estate->paid }} ريال </td>
                        </tr>
                        <tr>
                            <th>في انتطار الدفع</th>
                            <td>{{ $estate->unpaid }} ريال </td>
                        </tr>
                        <tr>
                            <th>الفرق بين المدفوعات و ما في الانتظار</th>
                            <td>{{ $estate->total_payments }} ريال </td>
                        </tr>
                        <tr>
                            <th>الواردات</th>
                            <td>{{ $estate->imports }} ريال </td>
                        </tr>
                        <tr>
                            <th>الصادرات</th>
                            <td>{{ $estate->exports}} ريال </td>
                        </tr>
                        <tr>
                            <th>الفرق بين الصادرات والواردات</th>
                            <td>{{ $estate->gain_payments}} ريال </td>
                        </tr>
                        <tr>
                            <th>صاحب العقار</th>
                            <td>{{ $estate->user->name}} </td>
                        </tr>
                        <tr>
                            <th>المدينة</th>
                            <td>{{ $estate->city->name}} </td>
                        </tr>

                    </table>
                    <br>
                    <a href="{{ route('estates.index') }}" style="width: 100%" class="btn btn-success">الرجوع</a>
                </div>
            </div>

        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('backend-footer')
@endsection