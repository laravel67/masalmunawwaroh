<div class="bs-stepper-header table-responsive mb-2" role="tablist">
    <div class="step1">
        <span class="bs-stepper-circle {{ $validatedSteps['step1'] ? 'bg-success' : 'bg-secondary' }}">
            <i class="fas fa-id-card"></i>
        </span>
        <span class="bs-stepper-label">
            <i class="fas fa-check-circle {{ $validatedSteps['step1'] ? 'text-success' : 'text-secondary' }}"></i>
        </span>
    </div>
    <div class="bs-stepper-line {{ $validatedSteps['step1'] ? 'bg-success' : 'bg-secondary' }}"></div>
    
    {{-- Step 2 --}}
    <div class="step2">
        <span class="bs-stepper-circle {{ $validatedSteps['step2'] ? 'bg-success' : 'bg-secondary' }}">
            <i class="fas fa-school"></i>
        </span>
        <span class="bs-stepper-label">
            <i class="fas fa-check-circle {{ $validatedSteps['step2'] ? 'text-success' : 'text-secondary' }}"></i>
        </span>
    </div>
    <div class="bs-stepper-line {{ $validatedSteps['step2'] ? 'bg-success' : 'bg-secondary' }}"></div>
    
    {{-- Step 3 --}}
    <div class="step3">
        <span class="bs-stepper-circle {{ $validatedSteps['step3'] ? 'bg-success' : 'bg-secondary' }}">
            <i class="fas fa-user-friends"></i>
        </span>
        <span class="bs-stepper-label">
            <i class="fas fa-check-circle {{ $validatedSteps['step3'] ? 'text-success' : 'text-secondary' }}"></i>
        </span>
    </div>
    <div class="bs-stepper-line {{ $validatedSteps['step3'] ? 'bg-success' : 'bg-secondary' }}"></div>
    
    {{-- Step 4 --}}
    <div class="step4">
        <span class="bs-stepper-circle {{ $validatedSteps['step4'] ? 'bg-success' : 'bg-secondary' }}">
            <i class="fas fa-file"></i>
        </span>
        <span class="bs-stepper-label">
            <i class="fas fa-check-circle {{ $validatedSteps['step4'] ? 'text-success' : 'text-secondary' }}"></i>
        </span>
    </div>
    
</div>