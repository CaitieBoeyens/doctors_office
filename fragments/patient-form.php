<div id="patient-modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">New Patient</p>
            <button class="delete" aria-label="close" onclick="modalToggle('patient')"></button>
        </header>
            <section class="modal-card-body">
                <div class="field">
                            <label class="label">Patient Name</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" type="text" placeholder="Patient">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Medical Aid Number</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" type="text" placeholder="Medical Aid Number">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-notes-medical"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Phone Number</label>
                            <div class="control has-icons-left">
                                <input class="input" type="text" placeholder="Phone Number">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-phone"></i>
                                </span>
                                
                            
                            </div>

                        </div>
                        
            </section>
        <footer class="modal-card-foot">
            <input class="button is-orange has-text-light" type="submit" name="appointmentSubmit" value="Save changes">
            <button class="button">Cancel</button>
        </footer>
    </div>
</div>

