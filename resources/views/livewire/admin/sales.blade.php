<div>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="true">Sales</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="services-tab" data-toggle="tab" href="#services" role="tab" aria-controls="services" aria-selected="false">Services</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                        <div class="card">
                            <div class="card-header">
                                <h1>Order Sales report</h1>
                                {{-- <button class="btn btn-info" wire:click="daily">Daily</button>
                                <button class="btn btn-info" wire:click="ifweekly">Weekly</button> --}}
                                
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="sales_table">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th>Year</th>
                                            <th>Week no.</th>
                                            <th>Total Weekly orders</th>
                                            <th>Weekly Sales</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ws as $s)
                                            <tr>
                                                <td>{{ $s->year }}</td>
                                                <td>Week {{ $s->week }}</td>
                                                <td>{{ $s->quantity }}</td>
                                                <td>₱ {{ $s->total }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot >
                                        <th class="bg-dark" colspan="3" style="text-align: right; padding-right: 10px;">Total Sales</th>
                                        <th>₱ {{ $sales }}</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services">
                        <div class="card">
                            <div class="card-header">
                                <h1>Services Sales report</h1>
                                {{-- <button class="btn btn-info" wire:click="daily">Daily</button>
                                <button class="btn btn-info" wire:click="ifweekly">Weekly</button> --}}
                                
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="services_r">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th>Year</th>
                                            <th>Week no.</th>
                                            <th>Total Weekly Services</th>
                                            <th>Weekly Sales</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ss as $w)
                                        <tr>
                                            <td>{{ $w->year }}</td>
                                            <td>Week {{ $w->week }}</td>
                                            <td>{{ $w->quantity }}</td>
                                            <td>₱ {{ $w->tot }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <th class="bg-dark" colspan="3" style="text-align: right; padding-right: 10px;">Total Sales</th>
                                        <th>₱ {{ $sales_service }}</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
