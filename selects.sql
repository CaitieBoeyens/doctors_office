/* Full name doctors with rooms and appointments */

SELECT doctors.first_name as doctor_name,
        doctors.last_name as doctor_surname,
        doctors.img_path
FROM doctors
WHERE doctors.id = :id;

SELECT appointments.date as appointment_date,
        appointments.time as appointment_time
FROM appointments
        INNER JOIN doctors
        ON appointments.doc_id = doctors.id
WHERE doctors.id = :id;

SELECT rooms.room_num, rooms.floor_num
FROM rooms
        INNER JOIN doctors
        ON rooms.doc_id = doctors.id
WHERE doctors.id = :id;


/* all appointments with room details, doctor surname and patient name */

SELECT appointments.date, appointments.time,
        rooms.room_num, rooms.floor_num,
        doctors.last_name as doctor_surname,
        patients.name as patient_name
FROM appointments
        INNER JOIN rooms ON appointments.room_id = rooms.id
        INNER JOIN doctors ON appointments.doc_id = doctors.id
        INNER JOIN patients ON appointments.patient_id = patients.id;

/* patients details with appointments */

SELECT patients.name as patient_name, patients.medical_aid, patients.phone,
        appointments.date as appointment_date,
        appointments.time as appointment_time,
        doctors.last_name as doctor_surname,
        rooms.floor_num,
        rooms.room_num
FROM appointments
        INNER JOIN rooms ON appointments.room_id = rooms.id
        INNER JOIN doctors ON appointments.doc_id = doctors.id
        INNER JOIN patients ON appointments.patient_id = patients.id
WHERE patients.id = :id;
