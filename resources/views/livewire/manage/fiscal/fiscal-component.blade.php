<div>
    <div class = "row mb-4">
        <div class = "col-md-2">
            {{ Form::select('fiscalyear_code', $fiscalyear_select, $fiscalyear_code, ['wire:change' => 'changeyear(event.target.value)', 'class' => 'form-control select2', 'placeholder' => '--เลือกปีงบประมาณ--']) }}
        </div>
    </div>
    <table class="table table-bordered table-hover table-striped dataTable" id="Datatables">
        <thead>
            <tr class="text-center">
                <th>ประเภทกิจกรรม</th>
                <th>จำนวนงบประมาณ</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($reqform_list->toArray()))
                @php
                    $total_activity=0;
                @endphp
                @foreach ($reqform_list as $item)
                    @php
                        $total_activity += $item['sum_total_amt'];
                    @endphp
                    <tr>
                        <td><strong>{{ $item['name'] }}</strong></td>
                        <td class="text-right"><strong>{{ number_format($item['sum_total_amt'],2) }}</strong></td>
                    </tr>
                @endforeach
                    <tr>
                        <td><strong>รวมจำนวนเงินจัดกิจกรรม</strong></td>
                        <td class="text-right"><strong>{{ number_format($total_activity,2) }}<strong></td>
                    </tr>
                    <tr>
                        <td><strong>จำนวนเงินที่เสนองบประมาณ</strong></td>
                        <td class="text-right"><strong>{{ number_format($req_amt,2) }}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>ได้รับงบประมาณ</strong></td>
                        <td class="text-right">
                            {{ Form::number('budget_amt', $budget_amt_test,['wire:model'=>'budget_amt', 'id'=>'budget_amt', 'class'=>'form-control col-md-4 float-right text-right']) }}
                        </td>
                    </tr>
            @else
                @foreach ($acttype_list as $item)
                    <tr>
                        <td><strong>{{ $item['name'] }}</strong></td>
                        <td class="text-right"><strong>0.00</strong></td>
                    </tr>
                @endforeach
                    <tr>
                        <td><strong>รวมจำนวนเงินจัดกิจกรรม</strong></td>
                        <td class="text-right"><strong>0.00<strong></td>
                    </tr>
                    <tr>
                        <td><strong>จำนวนเงินที่เสนองบประมาณ</strong></td>
                        <td class="text-right"><b>{{ number_format($req_amt,2) }}<b></td>
                    </tr>
                    <tr>
                        <td><strong>ได้รับงบประมาณ</strong></td>
                        <td class="text-right">
                            {{ Form::number('budget_amt', $budget_amt_test,['wire:model'=>'budget_amt', 'id'=>'budget_amt', 'class'=>'form-control col-md-4 float-right text-right']) }}
                        </td>
                    </tr>
            @endif
        </tbody>
    </table>
    <br>
    <div class = "text-center">
        <button type="button" onclick="submit()" class="btn btn-primary" >บันทึกงบประมาณ</button>
    </div>

</div>
@push('js')
<script>
    function setValue(name, val){
        @this.set(name, val);
    }
    Livewire.on('popup', () => {
            swal({
                title: "บันทึกข้อมูลเรียบร้อย",
                type: "success",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "OK",
                },
                function(isConfirm){
                    if (isConfirm) {
                        window.livewire.emit('redirect-to');
                }
            });
        });
    function submit() {
        swal({
            title: 'ยืนยันการบันทึกข้อมูล ได้รับงบประมาณ ?',
            icon: 'close',
            type: "warning",
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            confirmButtonColor: '#00BCD4',
            cancelButtonColor: '#DD6B55'
        }, function(isConfirm) {
            if (isConfirm) {
                @this.submit();
            }
        });
    }
</script>
@endpush

