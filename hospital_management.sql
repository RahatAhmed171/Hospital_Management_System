
CREATE TABLE IF NOT EXISTS outpatient (
    opid INT AUTO_INCREMENT,
   
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    phone VARCHAR(20)NOT NULL,
    sex VARCHAR(10) NOT NULL,
    address VARCHAR(255),
    
    PRIMARY KEY (opid)
   
        
);


CREATE TABLE IF NOT EXISTS doctor(
    docid INT AUTO_INCREMENT,
   
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20)NOT NULL,
    department VARCHAR(50) NOT NULL,
    specialist VARCHAR(40),
    
    PRIMARY KEY (docid)
   
        
);

CREATE TABLE IF NOT EXISTS room(

room_id INT AUTO_INCREMENT,
room_type VARCHAR(20) NOT NULL,
room_status VARCHAR(10) NOT NULL,

PRIMARY KEY (room_id)
);

CREATE TABLE IF NOT EXISTS inpatient (
    ipid INT AUTO_INCREMENT,
   
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    phone VARCHAR(20) NOT NULL,
    sex VARCHAR(10) NOT NULL,
    address VARCHAR(255),
    health_problem TEXT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE,
    bed_no INT,
    docid INT,
    room_id INT,
    
    PRIMARY KEY (ipid),
FOREIGN KEY (docid) REFERENCES doctor (docid) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (room_id) REFERENCES room (room_id) ON DELETE SET NULL ON UPDATE CASCADE
    
    
        
);

CREATE TABLE test(
   test_id INT AUTO_INCREMENT,
   patient_type varchar(20) NOT NULL,
   test_name varchar(255) NOT NULL,
   test_amount FLOAT NOT NULL,
   test_date DATE,
   test_result TEXT,
   docid INT,
   opid INT,
   ipid INT,
   
   PRIMARY KEY (test_id),
   
FOREIGN KEY (docid) REFERENCES doctor (docid) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (opid) REFERENCES outpatient (opid) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (ipid) REFERENCES inpatient(ipid) ON DELETE CASCADE ON UPDATE CASCADE   
);

CREATE TABLE bill(
bill_id INT AUTO_INCREMENT,
test_charge FLOAT,
no_of_days INT,
room_charge FLOAT,
Surgeries FLOAT,
Total FLOAT,
ipid INT,
opid INT,

PRIMARY KEY (bill_id),

FOREIGN KEY (opid) REFERENCES outpatient (opid) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (ipid) REFERENCES inpatient(ipid) ON DELETE CASCADE ON UPDATE CASCADE   
   


);


