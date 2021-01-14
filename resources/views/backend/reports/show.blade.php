@extends('backend.layout.master')
@section('backend-head')
@endsection
@section('backend-main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> العقار {{ $report->estate->name }}</h4>
                    <hr>
                    <div style="height: 200px" class="text-center">
                        @if(isset($report->estate->mainImage))
                            <img style="height: 100%;border-radius: 10px" alt="الصورة" src="{{ asset('pictures/estates/' . $report->estate->mainImage->file) }}"/>
                        @else
                            <img style="height: 100%;border-radius: 10px" alt="الصورة" src="{{ asset('backend/assets/images/empty.jpg') }}"/>
                        @endif
                    </div>
                    <hr>
                    <table class="table table-striped table-bordered dt-responsive nowrap">
                        <tr>
                            <th>اسم العقار</th>
                            <td>{{ $report->estate->name }}</td>
                        </tr>
                        <tr>
                            <th>عنوان العقار</th>
                            <td>
                                {{ $report->estate->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>عدد الطوابق</th>
                            <td>{{ $report->estate->floors_count }}</td>
                        </tr>
                        <tr>
                            <th>عدد الشقق في الطابق</th>
                            <td>{{ $report->estate->apartments_count }}</td>
                        </tr>
                        <tr>
                            <th>عدد الشقق الخالية</th>
                            <td>{{ $report->estate->empty_apartments_count }}</td>
                        </tr>
                        <tr>
                            <th>عدد الشقق المأهولة</th>
                            <td>{{ $report->estate->rented_apartments_count }}</td>
                        </tr>
                        <tr class="text-primary">
                            <th>المدفوعات</th>
                            <td>{{ $report->estate->paid ?? '----' }} ريال </td>
                        </tr>
                        <tr class="text-danger">
                            <th>في انتطار الدفع</th>
                            <td>{{ $report->estate->unpaid ?? '----' }} ريال </td>
                        </tr>
                        <tr>
                            <th>الفرق بين المدفوعات و ما في الانتظار</th>
                            <td>{{ $report->estate->total_payments ?? '----' }} ريال </td>
                        </tr>
                        <tr class="text-primary">
                            <th>الواردات</th>
                            <td>{{ $report->estate->imports ?? '----' }} ريال </td>
                        </tr>
                        <tr class="text-danger">
                            <th>الصادرات</th>
                            <td>{{ $report->estate->exports ?? '----' }} ريال </td>
                        </tr>
                        <tr>
                            <th>الفرق بين الصادرات والواردات</th>
                            <td>{{ $report->estate->gain_payments ?? '----' }} ريال </td>
                        </tr>
                        <tr>
                            <th>صاحب العقار</th>
                            <td>{{ $report->estate->user->name}} </td>
                        </tr>
                        <tr>
                            <th>المدينة</th>
                            <td>{{ $report->estate->city->name}} </td>
                        </tr>

                    </table>
                    <br>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">معلومات العملية</h4>
                                <table class="table table-striped table-bordered dt-responsive nowrap">
                                    <tr>
                                        <th>اسم العملية</th>
                                        <td>{{ $report->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>الشقة</th>
                                        <td>
                                            {{ $report->flat ?? '----' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>الدور</th>
                                        <td>
                                            {{ $report->floor ?? '----' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>السعر المسجل</th>
                                        <td>
                                            {{ $report->price ?? '----' }} ريال 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>التاريخ</th>
                                        <td>
                                            {{ $report->date ?? '----' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>اللون المميز</th>
                                        <td style="background: {{ $report->color }}">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <a href="{{ route('estates.index') }}" style="width: 100%" class="btn btn-success">الرجوع</a>
                </div>
            </div>

        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('backend-footer')
@endsection