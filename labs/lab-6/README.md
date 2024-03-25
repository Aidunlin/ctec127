# Module 5 - Lab No. 6

## Learning Objectives

- Use phpMyAdmin to create database tables
- Learn how to create database tables
- Learn how to create table columns
- Learn how to use phpMyAdmin to create data records
- Learn how to query a database table
- Learn how to upload data to a database table
- Learn how to delete data from a database table

## Assignment Details

1. Ensure that the **Apache** and **MySQL** processes are both started and running in **XAMPP**.
2. Launch **phpMyAdmin** using [http://localhost/phpmyadmin](http://localhost/phpmyadmin). If you are running **XAMPP** on a different port number you will need to change the URL accordingly.
3. Explore the **phpMyAdmin** interface by doing the following:
    - In the left navigator, explore the icons located beneath the **phpMyAdmin** logo.
    - In the left navigator, explore the tree view of the databases on your **MySQL** server installation.
    - Pay attention to the **names** of the **databases** and the **names** of the **tables** used.
    - In the main **phpMyAdmin** window explore the **General settings** and **Appearance settings**. Change the **theme** to **Original** and notice how the theme affects the **phpMyAdmin** interface.
    - Also, explore the **Font Size** option if it is available.
    - Now explore the **More settings** option.
    - Click on the **Manage Your Settings** button to get back to the settings main area.
4. Click on the **Home icon** in the **left navigator** to return to the **phpMyAdmin** home page. It's in the upper-left corner of the interface.
5. Click on the **Databases tab**.
6. Now it's time to **create a new database**. Create a new database named **ctec**. Enter the database name in the input field that has the helper text **Database name**. When you create the database, leave the “Collation” field set to it's default "Colation" value.
7. **Click** on the **Create** button to create the database.
8. If the database was **successfully created**, you should see a quick popup message letting you know so. You will then be brought to the new **ctec** database in **phpMyAdmin**.
9. You can also access the **ctec** database from the list of databases in the tree view in the left navigation panel.
10. Note that the database is empty and has no tables.
11. Now **create a database table** named **student**. For the number of columns enter 5.
12. Click the **Go** button to the lower right-hand to create the table. It make take a second or two to create the table.
13. You should see a screen that contains a lot of blank fields. These are the table columns that you will need to define. You will need to be super careful when creating the table columns. Let's do this.
14. Here are a list of the fields you will need to create along with their data type and other information. **Note the case** of the column names.

    - first_name, VARCHAR(20)
    - last_name, VARCHAR(40)
    - email, VARCHAR(60)
    - student_id, SMALLINT(4), Index/Primary
    - phone, VARCHAR(20)

15. Click on the **Save** button in the lower right. Your table should now be created. If you run into an error, contact the instructor.
16. Now click on the **ctec** database student table name in the top navigation. You should see a screen that has an **SQL statement** on it.
17. Take note of the text that says **Create PHP Code**. This text is towards the right side of the screen. **Click on it** to **see the PHP code** that would be used to **select all of the records** from the **student**. Click on the words **Without PHP Code** to **hide the code**.
18. To **review the structure** of your database table click on the **Structure** tab.
19. On this page you will see a list of all your **table columns** along with many options. Carefully review these options and note what they do.
20. Your **student_id** column should have the **key colored gold**. This means that it has been defined as the **primary key**. You did this when you created the table.
21. Pay particular attention to the **Change option**. If you ever have to use this feature, do it with great care.
22. Explore the **Space usage** section of the page. You can use this to see **how much data storage** is being used for the data in your table. You may need to **scroll down** to see it.
23. If you need to **add columns to your table** you can do this by using the **Add ___ column(s)** section of the page. You don’t need to do anything with this now. Just know it is there.
24. You are now going to **insert some data** into the **student table**. Typically you would do this programmatically through **PHP** and HTML **forms**. In this lab exercise you will be doing it manually. Later on in this lab you will bulk load data.
25. By default, **phpMyAdmin** gives you the ability to **enter two rows of data at a time**. You should see **5 fields on the screen to be filled in**. Before you enter any data, click on the **Function dropdown**. You won’t be using these in this lab, but you should know that they could be used to **manipulate the data being entered**.
26. Now **enter 5 sets of data** into your student The **Go button** will **insert** the data into the table for you. **Note that you can enter two sets of data a time**. Be sure to **un-tick** the **Ignore** check box to do this. You can find it right after the first set of input fields.
27. Note that there is an option to **Create PHP Code**. This will come in handy when you begin to include SQL code in your **PHP scripts**.
28. You will also see the SQL that **phpMyAdmin** used to **insert the data into the student table**. Study the **SQL** and see if you can decipher what it means.
29. Remember, click on the **Import** tab to enter more data if you would like.
30. Click on the **Browse** tab and you should see a screen that displays the **5 rows** of data that you entered.
31. Again, note the **SQL statement** that is used to display all of the records in your **student** table.
32. Click on the **Export** tab. This screen will allow you to **export data from you table to a file**. For this exercise do the following:
    - **Export Method**: Set to **Quick**
    - **Format**: Select **CSV** (Comma Separated Value)
    - Click the **Go** button to run the export.
33. **Open** the **CSV file** in **Visual Studio Code** and you **should see** the **5 rows** of data from the **student table** separated by commas.
34. The last part of this lab will be to **bulk upload** 99 rows of data into your **student table**. I have prepared a set of data using the [http://generatedata.com](http://generatedata.com) site. Visit this website and explore what it can do and how it can help you as a developer.
35. In **phpMyAdmin** click on the **SQL tab**.
36. Note that at the very top of the screen it tells you **which database and table** you have selected. It is very important that you are in the **correct table** before you try and perform any operations on a table.
37. Delete the line window that says ```SELECT * FROM ‘students’ WHERE 1```
38. Now copy the lines below into your clipboard and paste them into the window:

```sql

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Finnigan","Leonard","molestie.tellus@Proinsed.com","(769) 870-7056","2174");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Ivana","Grossman","sagittis@Duis.edu","(154) 270-3158","6904");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Lydia","Kramer","cursus@posuerevulputatelacus.ca","(849) 748-0865","9934");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Chester","Hammond","congue@Aliquam.net","(411) 922-3562","7306");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Dana","Vega","laoreet.lectus@dictum.ca","(551) 689-4106","7212");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Erasmus","Acosta","non.lacinia@nec.net","(110) 347-1591","7254");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Germaine","Mills","et@utlacusNulla.net","(274) 535-9412","6326");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Holmes","Pearson","at.augue@euelit.edu","(341) 455-0037","7502");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Mallory","Barry","enim@utaliquamiaculis.org","(424) 373-5629","3947");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Paul","Kramer","Mauris@ullamcorperDuiscursus.co.uk","(796) 395-5603","7696");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Leah","Fowler","Vivamus.molestie.dapibus@Etiam.ca","(603) 642-6098","7952");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Lev","Velez","fringilla.mi@interdum.co.uk","(184) 767-7358","8448");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Tobias","Campbell","dolor.quam@ac.edu","(855) 669-1404","7063");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Sigourney","Moses","felis@purusNullam.ca","(649) 375-2082","7492");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Yardley","Castro","vel.convallis.in@Aenean.com","(180) 682-4115","2785");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Noel","Castaneda","scelerisque@molestietortor.com","(121) 241-2079","5123");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Hillary","Adams","adipiscing.elit@porta.edu","(352) 851-0417","6504");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Cooper","Dunlap","nibh.enim@necligulaconsectetuer.edu","(885) 408-1212","7070");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Amanda","Norris","eu.odio.Phasellus@porttitortellusnon.com","(655) 814-1340","6068");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Claudia","Rosales","risus.Morbi.metus@tinciduntDonec.com","(175) 144-3830","2399");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Ebony","Bean","Cras.pellentesque@metusurnaconvallis.edu","(368) 184-6360","9551");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Wylie","Thomas","vel@pharetraNamac.net","(563) 719-4573","4790");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Cara","Gould","ligula@diameudolor.net","(676) 787-4112","5515");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Aretha","Parks","tincidunt@arcuac.net","(184) 281-2784","9334");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Dylan","Preston","eu.erat@lorem.co.uk","(368) 401-0646","3115");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Walker","Carpenter","enim.commodo@morbitristiquesenectus.co.uk","(391) 297-7987","6517");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Reed","Huff","tellus.lorem.eu@necluctus.com","(695) 808-8435","6463");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Jerome","Johnson","sapien.molestie.orci@auctorMauris.edu","(264) 807-7071","5925");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Petra","Morse","sagittis.Duis.gravida@facilisis.net","(902) 783-9778","2318");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Alyssa","Hansen","penatibus@ProinmiAliquam.co.uk","(636) 699-2477","4853");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Ora","Guerrero","ullamcorper.viverra.Maecenas@malesuada.org","(246) 244-6977","8519");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Dorothy","Hutchinson","consequat.auctor@nequeNullamut.com","(538) 451-4254","1976");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Brynn","Lowery","magna.et@Innecorci.co.uk","(664) 924-8395","4799");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Abigail","Howard","metus.In@molestietellusAenean.co.uk","(145) 183-7993","9950");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Evelyn","Howell","eu@pede.ca","(207) 729-0516","4726");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Palmer","Robinson","lacus.Cras.interdum@Suspendissealiquet.com","(145) 577-8433","8813");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Montana","Valentine","condimentum.Donec@ametluctus.edu","(733) 781-1498","1705");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Zorita","Walter","tincidunt@Maecenasiaculisaliquet.co.uk","(837) 452-6128","7396");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Cherokee","Benton","eu.ultrices@libero.net","(865) 282-1483","2926");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Cain","Pena","sagittis@enim.co.uk","(658) 688-0858","8772");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Athena","Spencer","enim.condimentum@volutpatnunc.edu","(283) 905-4277","8350");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Tamekah","Perez","Duis.sit@Maecenas.edu","(909) 455-3693","8955");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Laura","Workman","lacinia.mattis.Integer@Mauris.com","(689) 747-2377","1473");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Stone","Cobb","ornare.sagittis@malesuadaiderat.net","(876) 421-0071","8351");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Coby","Alford","convallis.erat@velitinaliquet.org","(525) 247-6027","2231");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Wayne","Barr","dis@turpis.ca","(861) 291-1091","2121");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Lydia","Hensley","diam.at@porta.com","(667) 484-8722","4917");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Alana","Kent","mattis@atvelit.net","(754) 734-5284","5228");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Nathaniel","Conner","leo.Vivamus.nibh@dolornonummyac.ca","(843) 824-8010","8662");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Dara","Wilkins","Curae.Donec@lacusvarius.co.uk","(458) 665-9400","2499");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Kyle","Griffin","enim.commodo.hendrerit@metusInnec.com","(317) 176-2473","7178");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Fritz","Mcmillan","vel.quam@at.co.uk","(563) 586-2428","6843");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Akeem","Velazquez","Nam.ligula.elit@lorem.com","(792) 186-4740","6673");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Chastity","Head","eleifend.non@Craslorem.co.uk","(173) 718-0973","7451");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Catherine","Pate","blandit.Nam@semPellentesque.co.uk","(721) 964-3053","7893");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Lydia","Martinez","semper.auctor@nibh.edu","(105) 383-7451","2813");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Heidi","Coffey","feugiat@sedlibero.edu","(839) 577-8615","9337");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Maile","Lloyd","et.tristique.pellentesque@arcu.org","(184) 141-4727","7554");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Kay","Byers","aliquet.sem@dictumauguemalesuada.edu","(848) 443-0710","3480");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Nina","Browning","Fusce.aliquet@metusAenean.edu","(962) 277-4759","6304");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Rogan","Patel","Quisque@Aliquam.co.uk","(213) 591-4759","8437");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Neville","Watson","ornare.lectus@nec.org","(716) 183-1861","6094");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Zephania","Hale","hendrerit@non.com","(940) 125-7505","1190");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Maisie","Fisher","Cras.dolor@mifelisadipiscing.co.uk","(769) 558-2004","3207");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Briar","Holden","lorem.eget.mollis@lacus.edu","(932) 223-4586","9695");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Zelenia","Paul","senectus.et.netus@Donecvitaeerat.ca","(483) 113-3217","3461");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Geoffrey","Calhoun","tortor.at.risus@magnaseddui.net","(351) 913-0178","4344");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Christian","Sharpe","eu@aliquet.edu","(318) 679-6205","6630");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Baxter","Burch","velit.Cras@sapien.co.uk","(241) 220-5567","2506");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Wylie","Bennett","ante@convallisante.ca","(537) 596-5801","6043");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Gwendolyn","Barnett","nascetur.ridiculus@enimEtiamgravida.ca","(304) 288-4587","2323");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Kerry","Ford","enim.commodo@leo.edu","(777) 658-8120","6164");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Nissim","Mclaughlin","pretium.aliquet@vestibulumMauris.com","(710) 256-2979","6688");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Pearl","Allison","ut.ipsum.ac@pellentesquemassalobortis.edu","(883) 315-0973","8172");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Aladdin","Lowery","Etiam@sapien.ca","(864) 139-9841","5107");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Wyatt","Pena","mi.enim@vestibulumneceuismod.com","(604) 774-7324","4533");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Allegra","Haley","scelerisque.neque@metusAliquamerat.edu","(148) 100-3163","4313");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Lawrence","Crosby","velit.Sed.malesuada@pharetrafeliseget.org","(119) 406-3633","9295");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Angelica","Short","arcu.imperdiet@malesuada.ca","(425) 392-7177","2037");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Donna","Roman","nulla.Integer@tortordictum.ca","(820) 992-3687","1780");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Lysandra","Hardin","at.egestas.a@semutdolor.com","(512) 859-1726","7474");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Anne","Romero","enim@eratinconsectetuer.net","(621) 947-3209","8472");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Nasim","Knowles","nibh.lacinia.orci@enimCurabiturmassa.co.uk","(850) 959-5845","7286");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Devin","Scott","molestie@nibhsitamet.edu","(683) 873-4442","1578");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Howard","Buckley","ac.turpis@posuere.com","(225) 140-9306","3937");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Linda","Petersen","Duis@semper.org","(285) 133-6326","5917");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Adrian","Malone","montes.nascetur.ridiculus@Quisque.com","(435) 163-9629","9620");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Harper","Mccullough","eu.turpis@nulla.ca","(311) 418-1257","9070");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Maxine","Shields","eu.eleifend@ametdiam.com","(700) 252-0717","5388");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Hayden","Schroeder","ipsum@velitjustonec.org","(637) 638-2475","6646");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Brynne","Shepard","vitae@tortorat.edu","(180) 975-5706","9589");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Jin","Strickland","sagittis@sitamet.co.uk","(875) 986-3889","5305");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Ralph","Patterson","egestas.rhoncus.Proin@etlacinia.com","(850) 738-8833","8433");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Samson","Silva","fermentum.vel.mauris@Aenean.ca","(650) 737-6381","9436");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Flavia","Taylor","sollicitudin.adipiscing@eratvelpede.ca","(344) 444-0167","4277");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Freya","Nash","justo@tinciduntDonecvitae.ca","(985) 877-5422","2581");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Hamilton","Pratt","Nunc.commodo@eu.ca","(401) 597-8433","6831");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Ruth","Ortiz","mus.Aenean.eget@mauriseuelit.ca","(679) 346-5687","7769");

INSERT INTO `student` (`first_name`,`last_name`,`email`,`phone`,`student_id`) VALUES ("Karin","Galloways","in.aliquet.lobortis@ipsumdolor.ca","(950) 809-1391","3473");

```

39. Once the data is pasted in, click on the **Go** button in the lower right hand corner.
40. Click on the “Browse” tab and you should see all of the data that was inserted into the student table.
41. You are almost done! One more thing to explore.
42. Click on the **Browse** tab and scroll to the very bottom of the page and tick the **Check All** checkbox.
43. To the right of the tick box click on the **Delete** link. Notice that phpMyAdmin will ask you whether or not you really want to delete all of the data. Don't delete it at this time. If you do delete it, you will have to reload it following the steps to bulk load the data.
44. Note the **message that appeared** in a **green box** at the **top of the page**.
45. Now that you have a local database and table created it's time to **revisit the code from Module 5 - Unit 2**.
46. Make sure that you have **downloaded (not cloned) the repo** from **Module 5 - Unit 3**.
47. You may need to modify the database connection info in the **db_connect.inc.php** file to have it point to your MySQL **ctec student** table and **not the Amazon database** in the cloud.
    - Change the **$host** variable to '**localhost'**.
    - Change the **$user** variable to '**root**'.
    - Change the **$password** variable to ''.
    - Change the **$dbname** variable to '**ctec**'.
48. Now launch the PHP **student_data.php** script and you should see the data from the **local** (not the AWS) student table.
49. Once you complete this step, **submit a screenshot** of the **PHP script running in your browser** and **submit it on Canvas**.
