# Recruitment-Automation-Application


#Demo


==========================================================  
==========================================================  
============Front Desk Module==========================

http://recruitment.infinityfreeapp.com/Front Desk


Login Id : frontdesk@cloudinfosolutions.com
Login pwd: frontdesk@123

==========================================================  
==========================================================  
============Screening Module==============================

http://recruitment.infinityfreeapp.com/Screening

Login Id : screening@cloudinfosolutions.com
Login pwd: screening@123


==========================================================  
==========================================================  
============Hr-Admin Module==============================

http://recruitment.infinityfreeapp.com/HR-Admin

Login Id : hr-admin@cloudinfosolutions.com
Login pwd: hr-admin@123


==========================================================  
==========================================================  
============HOD Module==============================

http://recruitment.infinityfreeapp.com/HOD


Login Id : hod@cloudinfosolutions.com
Login pwd: hod@123

==========================================================  
==========================================================  

Functions and working steps of the application for candidate hiring is devided into 4 modules:
1. Front Desk Module  
-> Receptionist Login page with validation of username and password.  
-> Receptionist do Candidate registration.  
-> Candidate id will be auto generated and unique.  
-> Set of Profiles and question set difficulty level(Basic/Intermediate/Advanced/Professional) will be assigned to the candidate by the system itself on the basis of their experience and department choosed.  
-> If candidate is not satisfied with assigned profile that can be changed further by the HR in Screening module.  
  
2. Screening Module  
--> HR/Admin login page with credential validation.   
--> HR/Admin can choose the candidate from the List of registered candidate as well as can change their registraion information and their profile and question set assigned in the Front Desk Module. After that candidate can give the test.  
--> Candidate have to fill Recruitment Questionnaire which includes extentisive details obout the candidate. The interface include 30+ most commonly asked questions during the interview. The page includes of dynamic generation of text field, number input field and select field based on input. Candidate can add extra element to enter more details.  
--> Now Candidate is ready for the screening test.  
--> The difficulty level of question set assigned to the candidate will be fetched from the database. Each difficulty level(Basic/Intermediate/Advanced/Professional) consist of n subjects. For Accounting profile each difficulty level consist of 3 subjects(Accounting/English/Aptitude).  
--> The candidate have to attend question set of each subject one by one.   
--> Candidate cannot navigate back and forward(unlesss submit the answer) between the question sets.  
--> Each question set has time limit which will be displayed on the screen.  
--> In case the candidate don't submit the answer before time, the answer gets auto submitted after timer ends and redirects to the next page/question set.  
--> Question of each subject is fetched from question bank stored in database in random fashion. question won't be same for different candidates.  
--> After the end of Screening user will logged out from the system.  
  
3. HR-Admin Module  
--> HR/Admin login page with credential validation.  
--> In Screening Result tab HR/Admin selects the candidate, sees candidate's screening marks and enter their Excel test and Typing test marks manually which is taken in other software.  
--> HR/Admin can see cadidate's summary(basic information and marks in each subject) or detailed(summary + responses of each question + whole Recruitment Questionnaire response)  performance and decides to go further with the candidate or not. If yes then his/her name will be diplayed in select field of inteview tab otherwise he/she will rejected.  
--> After interview in the Interview tab, HR select the candidate, see his/her summary and detailed report, inputs own feedback regarding the candidature and again has two option proceed or reject. if proceeded then candidate transfer to next round HOD interview otherwise rejected in interview.  
  
4. HOD Module  
--> HOD login page with credential validation.  
--> In Screening Result tab HOD selects the candidate and can see candidate's performance.  
--> After Interview nn Interview tab HOD selects the candidate, sees his/her summary and detailed report, add feedback and decide to Hire or Reject the Candidate.  
--> If hired then salary will be discussed the submitted to the system at the same time.
    

