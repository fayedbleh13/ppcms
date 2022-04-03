<div class="container">
    <div class="card mt-5 shadow">
        <div class="card-header border">
            <h1 class="display-5  text-center">Services Offered</h1>
        </div>
        <div class="card-body border">
            <div class="row mt-5 mb-5">
                <div class="col-md-3">
                    <!-- ============================ COMPONENT BANNER 5  ================================= -->
                        <div class="card-banner shadow" style="height:250px; background-image: url('{{ asset('img/diagnose_motor.jpg') }}');">
                            <article class="caption bottom">
                                <h5 class="card-title">Diagnostic</h5>
                                <p>Diagnose a motorcycle by locating the source of problem that affects the performance</p>
                            </article>
                        </div>
                    <!-- ============================ COMPONENT BANNER 5  END .// =========================== -->
                </div>
                <div class="col-md-3">
                    <!-- ============================ COMPONENT BANNER 5  ================================= -->
                        <div class="card-banner" style="height:250px; background-image: url('{{ asset('img/repair_motor.jpg') }}');">
                            <article class="caption bottom">
                                <h5 class="card-title">Repair</h5>
                                <p>Fix basic problems that the motorcycle have appeared</p>
                            </article>
                        </div>
                    <!-- ============================ COMPONENT BANNER 5  END .// =========================== -->
                </div>
                <div class="col-md-3">
                    <!-- ============================ COMPONENT BANNER 5  ================================= -->
                        <div class="card-banner" style="height:250px; background-image: url('{{ asset('img/changeoil_motor.png') }}');">
                            <article class="caption bottom">
                                <h5 class="card-title">Change Oil</h5>
                                <p>Change the oil of your motorcycle to further enhance your driving experience</p>
                            </article>
                        </div>
                    <!-- ============================ COMPONENT BANNER 5  END .// =========================== -->
                </div>
                <div class="col-md-3">
                    <!-- ============================ COMPONENT BANNER 5  ================================= -->
                        <div class="card-banner" style="height:250px; background-image: url('{{ asset('img/repaint_motor.jpg') }}');">
                            <article class="caption bottom">
                                <h5 class="card-title">Repaint</h5>
                                <p>Repaint your motorcycles to what color you want, variety of colors are available.</p>
                            </article>
                        </div>
                    <!-- ============================ COMPONENT BANNER 5  END .// =========================== -->
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="card-banner" style="height:250px; background-image: url('{{ asset('img/topoverhaul_motor.jpg') }}');">
                        <article class="caption bottom">
                            <h5 class="card-title">Overhaul</h5>
                            <p>Completely disassemble and replace motorcycle parts to further improve the efficiency of your motorcycle</p>
                        </article>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-banner" style="height:250px; background-image: url('{{ asset('img/overhaul_motor.jpg') }}');">
                        <article class="caption bottom">
                            <h5 class="card-title">Top Overhaul</h5>
                            <p>Partially disassemble the upper part of your motorcyle and replace them with a better parts for your motorcyle.</p>
                        </article>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-banner" style="height:250px; background-image: url('{{ asset('img/wiring_motor.jpg') }}');">
                        <article class="caption bottom">
                            <h5 class="card-title">Wiring</h5>
                            <p>Rewired certain wires in your motorcyle that affect the functionality and efficiency, while also fixing critical part</p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-5  mt-4 border shadow">
        <div class="card-header">
            <h1 class="title text-center">Schedule an Appointment here</h1>
        </div>
        <div class="card-body mt-3 mb-3">
            <div class="container border pt-4 pb-4 pl-4 pr-4" style="width: 50%">
                <h4 class="mb-3 font-weight-bold">Service Appointment Information</h4>
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                      <h5 class="card-title">Note:</h5>
                      <p class="card-text lead">Please be aware that Scheduling an Appointment will cost an initial fee of ₱ 50.</p>
                    </div>
                </div>
                <hr>
                <form wire:submit.prevent="bookService">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="">Date</label>
                                <input type="date" class="form-control" wire:model="booked_date">
                            </div>
                            <div class="col">
                                <label for="">Time</label>
                                <input type="time" class="form-control" wire:model="booked_time">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" wire:model="service_id">
                            <option value="">Select type of service</option>
                            @foreach ($service as $s)
                                <option value="{{ $s->id }}">{{ $s->name }}</option>
                            @endforeach
                            
                        </select>
                    </div>
            
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-success">Confirm Booking</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    
   
</div>
