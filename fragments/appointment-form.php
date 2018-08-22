<div id="appointment-modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">New Appointment</p>
            <button class="delete" aria-label="close" onclick="modalToggle('appointment')"></button>
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
                            <label class="label">Doctor name</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" type="text" placeholder="Doctor">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user-md"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Time</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" type="time" placeholder="Time">
                                <span class="icon is-small is-left">
                                    <i class="far fa-clock"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Room</label>
                            <div class="control has-icons-left">
                                <div class="select">
                                    <select>
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                                <span class="icon is-small is-left">      
                                    <i class="fas fa-hospital-alt"></i> 
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

