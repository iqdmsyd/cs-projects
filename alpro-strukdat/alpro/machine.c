#include "header.h"

/*-------------- AKSES FILE ----------------*/

void readFile(cType city[], pType path[]){

	FILE *tkota;
	FILE *tjalur;
	cityCounter = 0;
	pathCounter = 0;
	char temp[2][8]; /* menampung hasil baca dari file */

	tkota = fopen("tkota.txt", "r"); /* membuka file tkota.txt untuk dibaca */

	fscanf(tkota, "%s %s %s\n", temp[0], temp[1], city[cityCounter].name);
	/* fungsi atoi untuk mengubah string ke bentuk integer */
	city[cityCounter].x = atoi(temp[0]); 
	city[cityCounter].y = atoi(temp[1]);

	/* proses baca dilanjutkan sampai bertemu data dummy */
	while(strcmp(temp[0], "#") != 0){
		fscanf(tkota, "%s %s %s\n", temp[0], temp[1], city[cityCounter+1].name);
		city[cityCounter+1].x = atoi(temp[0]);
		city[cityCounter+1].y = atoi(temp[1]);
		cityCounter++;
	}

	fclose(tkota); /* pembacaan selesai */

	tjalur = fopen("tjalur.txt", "r"); /* membuka file tjalur.txt untuk dibaca */

	fscanf(tjalur, "%s %s %s\n", temp[0], path[pathCounter].firstCity, path[pathCounter].secondCity);
	/* fungsi atoi untuk mengubah string ke bentuk integer */
	path[pathCounter].number = atoi(temp[0]);

	while(strcmp(temp[0], "#") != 0){
		fscanf(tjalur, "%s %s %s\n", temp[0], path[pathCounter+1].firstCity, path[pathCounter+1].secondCity);
		path[pathCounter+1].number = atoi(temp[0]);
		pathCounter++;
	}

	fclose(tjalur); /* pembacaan selesai */

}

void writeCity(cType city[]){

	FILE *tkota;
	tkota = fopen("tkota.txt", "w"); /* membuka file tkota.txt untuk ditulis */
	int i;

	for(i=0; i<cityCounter; i++){
		/* penulisan pada file dilakukan sebanyak data kota */
		fprintf(tkota, "%d %d %s\n", city[i].x, city[i].y, city[i].name);
	}
	fprintf(tkota, "%s %s %s\n", "#", "#", "##");

	fclose(tkota); /* penulisan pada file selesai */

}

void writePath(pType path[]){

	FILE *tjalur;
	tjalur = fopen("tjalur.txt", "w"); /* membuka file tjalur.txt untuk ditulis */
	int i;

	for(i=0; i<pathCounter; i++){
		/* penulisan pada file dilakukan sebanyak data kota */
		fprintf(tjalur, "%d %s %s\n", path[i].number, path[i].firstCity, path[i].secondCity);
	}
	fprintf(tjalur, "%s %s %s\n", "#", "##", "##");

	fclose(tjalur); /* penulisan pada file selesai */

}
/*-------------------------------------------*/



/*------------- POP PROCEDURES --------------*/

void popSubMenu(){

	printf("Menu :\n");
	printf("   1. Tambah\n");
	printf("   2. Hapus\n");
	printf("   3. Menu Utama\n");
	printf("Pilihan menu : ");

}

void popMap(cType city[], char map[][512], int length, int wide){

	int i, j;
	int code = 10; /* set code warna */
	length++;
	wide++;
	fillMap(city, map); /* isi peta */
	popBorder(wide);
	for(i=0; i<length; i++){
		printf("|");
		for(j=0; j<wide; j++){
			setColor(code, 0);
			printf("%c", map[i][j]);
			/* kondisi untuk merubah warna tiap kota */
			if(map[i][j-1] != ' ' && map[i][j] == ' '){
				code++;
				if(code > 14){
					code = 10;
				}
			}
		}
		setColor(15, 0);
		printf("|\n");
	}
	popBorder(wide);

}

void popCity(cType city[]){

	int i, j; 
	int max_length[3]; /* menyimpan panjang karakter maksimal tiap atribut */
	int temp_length; /* menyimpan panjang karakter sementara */
	char temp[16]; /* menyimpan karakter hasil konversi dari integer */
	sortCity(city);

	/* deklarasi panjang maksimal tiap atribut */
	max_length[0] = 1; 
	max_length[1] = 1;
	max_length[2] = 4;

	/* proses mencari panjang maksimal tiap atiribut */
	while(i<cityCounter){

		itoa(city[i].x, temp, 10); /* konversi integer ke string */
		if(strlen(temp) > max_length[0]){
			max_length[0] = strlen(temp);
		}

		itoa(city[i].y, temp, 10); /* konversi integer ke string */
		if(strlen(temp) > max_length[1]){
			max_length[1] = strlen(temp);
		}

		if(strlen(city[i].name) > max_length[2]){
			max_length[2] = strlen(city[i].name);
		}		

		i++;
	}
	/* estetika */
	max_length[0]+=3;
	max_length[1]+=3;
	max_length[2]+=4;

	int total = max_length[0] + max_length[1] + max_length[2] + 4; /* menyimpan total panjang, 4 adalah pembatas */

	system("cls");
	printf("Isi kota saat ini :\n");
	for(i=0; i<total; i++){
		printf("-");
	}
	printf("\n");

	printf("|x");
	for(i=0; i<max_length[0] - 1; i++){
		printf(" ");
	}
	printf("|y");
	for(i=0; i<max_length[1] - 1; i++){
		printf(" ");
	}
	printf("|kota");
	for(i=0; i<max_length[2] - 4; i++){
		printf(" ");
	}
	printf("|\n");

	for(i=0; i<total; i++){
		printf("-");
	}
	printf("\n");

	for(i=0; i<cityCounter; i++){

		itoa(city[i].x, temp, 10);
		printf("|%d", city[i].x); /* print koordinat x */
		for(j=0; j<max_length[0] - strlen(temp); j++){
			printf(" ");
		}

		itoa(city[i].y, temp, 10);
		printf("|%d", city[i].y); /* print koordinat y */
		for(j=0; j<max_length[1] - strlen(temp); j++){
			printf(" ");
		}

		printf("|%s", city[i].name); /* print nama kota */
		for(j=0; j<max_length[2] - strlen(city[i].name); j++){
			printf(" ");
		}
		printf("|\n");
	}

	for(i=0; i<total; i++){
		printf("-");
	}
	printf("\n\n\n");

}

void popPath(cType city[], pType path[], int length, int wide){

	int i, j;
	int x[2], y[2]; /* koordinat jalur */
	int max_length[3]; /* menyimpan panjang karakter maksimal tiap atribut */
	char temp[16]; /* menyimpan string hasil konversi dari integer */

	/* deklarasi panjang karakter setiap atribut */
	max_length[0] = 2;
	max_length[1] = 12;
	max_length[2] = 10;

	/* proses mencari panjang karakter maksimal tiap atribut */
	while(i<pathCounter){
		itoa(path[i].number, temp, 10);
		if(strlen(temp) > max_length[0]){
			max_length[0] = strlen(temp);
		}

		if(strlen(path[i].firstCity) > max_length[1]){
			max_length[1] = strlen(path[i].firstCity);
		}

		if(strlen(path[i].firstCity) > max_length[2]){
			max_length[2] = strlen(path[i].firstCity);
		}		
		i++; /* increment ke jalur berikutnya */
	}
	/* estetika */
	max_length[0]+=2;
	max_length[1]+=3;
	max_length[2]+=3;

	int total = max_length[0] + max_length[1] + max_length[2] + 4; /* menyimpan total panjang, 4 adalah pembatas */

	system("cls");
	printf("Daftar jalur :\n");
	for(i=0; i<total; i++){
		printf("-");
	}
	printf("\n");

	printf("|no");
	for(i=0; i<max_length[0] - 2; i++){
		printf(" ");
	}
	printf("|kota pertama");
	for(i=0; i<max_length[1] - 12; i++){
		printf(" ");
	}
	printf("|kota kedua");
	for(i=0; i<max_length[2] - 10; i++){
		printf(" ");
	}
	printf("|\n");

	for(i=0; i<total; i++){
		printf("-");
	}
	printf("\n");

	for(i=0; i<pathCounter; i++){
		itoa(path[i].number, temp, 10);
		printf("|%d", path[i].number); /* print no jalur */
		for(j=0; j<max_length[0] - strlen(temp); j++){
			printf(" ");
		}
		printf("|%s", path[i].firstCity); /* print kota pertama */
		for(j=0; j<max_length[1] - strlen(path[i].firstCity); j++){
			printf(" ");
		}
		printf("|%s", path[i].secondCity); /* print kota kedua */
		for(j=0; j<max_length[2] - strlen(path[i].secondCity); j++){
			printf(" ");
		}
		printf("|\n");
	}

	for(i=0; i<total; i++){
		printf("-");
	}
	printf("\n");

}

void popBorder(int wide){

	int i;
	printf("|");
	for(i=0; i<wide; i++){
		printf("-");
	}
	printf("|\n");

}

/*--------------------------------------------*/




/*---------------- MENU 0 --------------------*/

void setSize(int *length, int *wide){

	system("cls");
	printf("Ukuran peta saat ini :\n");
	printf("Panjang : %d\n", *length);
	printf("Lebar   : %d\n", *wide);
	printf("Ingin merubah ukuran peta? (y/n) : ");
 	char menu;
 	scanf(" %c", &menu);
 	if(menu == 'y'){
		printf("Panjang : ");
		scanf("%d", &*length); /* input panjang papan */
		printf("Lebar 	: ");
		scanf("%d", &*wide); /* input lebar papan */
		printf("Tersimpan!\n");
 	}else{
 		printf("Papan tidak diubah.\n");
 	}
	wait(1.5);
	system("cls");

}

/*--------------------------------------------*/




/*---------------- MENU 1 --------------------*/

void insertCity(cType city[]){

	printf("\nx : ");
	scanf("%d", &city[cityCounter].x); /* input koordinat x kota */
	printf("y : ");
	scanf("%d", &city[cityCounter].y); /* input koordinat y kota */
	printf("kota : ");
	scanf("%s", &city[cityCounter].name); /* input nama kota */
	int i, status = 0;
	for(i=0; i<cityCounter; i++){
		/* kondisi jika data kota sudah ada */
		if((strcmp(city[i].name, city[cityCounter].name) == 0) || (city[i].x == city[cityCounter].x && city[i].y == city[cityCounter].y)){
			status = 1;
		}
	}
	if(status == 1){
		printf("Nama kota atau koordinat kota sudah ada!\n");
		wait(1.5);
	}else{
		cityCounter++; /* jumlah kota bertambah */
		writeCity(city); /* lakukan penulisan pada file tkota */
		printf("Kota berhasil ditambahkan!\n");
		wait(1.0);
	}
	
}

void deleteCity(cType city[], pType path[]){

	int i, j, stat = 0; /* stat  */
	char search[16], menu;
	printf("\nKota yang dihapus : ");
	scanf("%s", &search); /* input nama kota yang akan dihapus */

	/* proses pencarian data dan penghapusan kota */ 
	for(i=0; i<cityCounter; i++){
		if(strcmp(city[i].name, search) == 0){
			printf("Data ditemukan, lanjutkan proses? (y/n) : ");
			scanf(" %c", &menu);
			if(menu == 'y'){
				for(j=i; j<cityCounter; j++){ /* proses penggeseran data */
					city[j] = city[j+1];
				}
				cityCounter--; /* jumlah kota berkurang */
				stat = 1;
				i+=cityCounter;
				printf("Data berhasil dihapus!\n");
				wait(1.0);
			}else{
				stat = 1;
				printf("Data tidak dihapus.\n");
				wait(2.0);
			}
		}
	}
	writeCity(city); /* lakukan penulisan pada file tkota */

	if(stat == 0){ /* jika tidak ada data yang ditemukan */
		printf("Data tidak ditemukan!\n");
		wait(2.0);
	}else if(stat == 1 && menu == 'y'){
		/* proses pencarian data dan penghapusan jalur */
		for(i=0; i<pathCounter; i++){		
			if(strcmp(path[i].firstCity, search) == 0 || strcmp(path[i].secondCity, search) == 0){
				for(j=i; j<pathCounter; j++){ /* proses penggeseran data */
					path[j] = path[j+1];
				}
				pathCounter--; /* jumlah jalur berkurang */
			}
		}
		writePath(path); /* lakukan penulisan pada file tjalur */
	}

}

void sortCity(cType city[]){

	cType temp; /* menyimpan data kota sementara */
	int i, status;

	do{

		status = 0;
		for(i=0; i<cityCounter-1; i++){
			/* data diurutkan berdasarkan koordinat terkecil, dimulai dengan membandingkan y kemudian x */
			if(city[i].y > city[i+1].y || (city[i].y == city[i+1].y && city[i].x > city[i+1].x)){
				temp = city[i];
				city[i] = city[i+1];
				city[i+1] = temp;
				status = 1;
			}
		}
	}while(status == 1);

	writeCity(city);

}

/*--------------------------------------------*/




/*---------------- MENU 2 --------------------*/

void insertPath(cType city[], pType path[]){

	printf("no jalur : ");
	scanf("%d", &path[pathCounter].number); /* input no jalur */
	printf("kota pertama : ");
	scanf("%s", &path[pathCounter].firstCity); /* input kota pertama */
	printf("kota kedua : ");
	scanf("%s", &path[pathCounter].secondCity); /* input kota kedua */
	int i, status = 0;
	for(i=0; i<pathCounter; i++){
		/* kondisi jika nama kota yang dimasukkan user tidak ada di file kota */
		if((path[i].number == path[pathCounter].number &&
			strcmp(path[i].firstCity, path[pathCounter].firstCity) == 0 &&
			strcmp(path[i].secondCity, path[pathCounter].secondCity) == 0) ||
			noRedundant(city, path)){
			status = 1;
		}
	}
	if(status == 1){
		printf("Jalur sudah ada atau kota tidak terdaftar!\n");
		wait(1.5);
	}else{
		pathCounter++; /* jumlah jalur bertambah */
		sortPath(city, path);
		printf("Jalur berhasil ditambahkan.\n");
		wait(1.0);
	}

}

void sortPath(cType city[], pType path[]){

	pType temp; /* menyimpan data jalur untuk sementara */
	int i, j;

	/* proses mengurutkan nomor jalur */
	for(i=1; i<pathCounter; i++){
		temp = path[i];
		j = i - 1;
		while(temp.number < path[j].number && j>=0){
			path[j+1] = path[j];
			j--;
		}
		path[j+1] = temp;
	}

	int status;

	do{
		/* proses mengurutkan jalur dengan nomor jalur yang sama
		   mengurutkan koordinat kota pertama secara ascending
		*/
		status = 0;
		for(i=0; i<pathCounter-1; i++){
			if((findY(city, path, i) > findY(city, path, i+1) && path[i].number == path[i+1].number) || 
			   (findY(city, path, i) == findY(city, path, i+1) && findX(city, path, i) > findX(city, path, i+1) &&
			   	path[i].number == path[i+1].number) ){
				temp = path[i];
				path[i] = path[i+1];
				path[i+1] = temp;
				status = 1;
			}
		}

	}while(status == 1);

	writePath(path);

}

void deletePath(pType path[]){

	int i, j, count = 0, status = 0, numSearch;
	char menu;
	printf("No. jalur : ");
	scanf("%d", &numSearch);

	/* menghitung berapa banyak jalur dengan no jalur sesuai numSearch */
	for(i=0; i<pathCounter; i++){
		if(numSearch == path[i].number){
			status = 1;
			count++;
		}
	}
	if(status == 1){ /* jika ditemukan data yang sesuai */
		printf("Data ditemukan, hapus semua jalur No. %d? (y/n) : ", numSearch);
		scanf(" %c", &menu);
		if(menu == 'y'){
			while(count != 0){
				/* proses hapus data */
				for(i=0; i<pathCounter; i++){
					if(numSearch == path[i].number){
						for(j=i; j<pathCounter; j++){
							path[j] = path[j+1];
						}
						pathCounter--;
						count--;
					}
				}
			}
		}
		else{
			status = 1;
			printf("Data tidak dihapus.\n");
			wait(2.0);
		}
		writePath(path); /* lakukan penulisan pada file tjalur */
	}else{
		printf("Data tidak ditemukan!\n");
		wait(2.0);
	}

}

/*--------------------------------------------*/




/*---------------- MENU 3 --------------------*/

void fillMap (cType city[], char map[][512]){

	int i, j, k, stat;
	int counter = 0;

	for(i=0; i<512; i++){
		for(j=0; j<512; j++){
			map[i][j] = ' ';
		}
	}

	/* isi cell map sesuai koordinat kota */
	while(counter < cityCounter){
		j = city[counter].x;
		for(k=0; k<strlen(city[counter].name); k++){
			map[city[counter].y][j] = city[counter].name[k];
			j++;
		}
		counter++;
	}

}

void solveAnimation(cType city[], pType path[], char map[][512], int length, int wide){

	int i, j, k;
	int cityCount = 0, pathCount = 0; /* counter perulangan kota dan jalur */
	int x[2], y[2]; /* menyimpan koordinat awal dan akhir x dan y */
	int start, end, type; /* menyimpan koordinat awal dan akhir perjalanan, type untuk menentukan apakah perjalanan tsb vertikal/horizontal */
	int code = 10; /* deklarasi kode warna */
	// int inc;
	length++;
	wide++;

	/* animasi dilakukan sebanyak jalur yang ada */
	do{
		/*	proses pertama yaitu mencari koordinat awal dan akhir x dan y
			proses dilakukan dengan mencari nama kota yang sama antara kota pertama
			atau kota kedua dari file jalur dengan nama kota yang ada di file kota
		*/
		for(cityCount=0; cityCount<cityCounter; cityCount++){
			if(strcmp(city[cityCount].name, path[pathCount].firstCity) == 0){
				x[0] = city[cityCount].x;
				y[0] = city[cityCount].y;
			}
			if(strcmp(city[cityCount].name, path[pathCount].secondCity) == 0){
				x[1] = city[cityCount].x;
				y[1] = city[cityCount].y;
			}
		}

		if(x[0] == x[1]){ /* perjalanan vertikal */
			type = 0;
			start = y[0];
			end = y[1];
		}else if(y[0] == y[1]){ /* perjalanan horizontal */
			type = 1;
			start = x[0];
			end = x[1];
		}else{ /* perjalanan vertikal dan horizontal */
			type = 2;
			start = x[0];
			end = x[1];
		}
		// inc = isInc(start, end);
		/* memulai print sepanjang selisih koordinat awal dan akhir perjalanan */
		while(start <= end){
			code = 10; /* set angka untuk kode warna */
			popBorder(wide);
			for(i=0; i<length; i++){
				printf("|");
				for(j=0; j<wide; j++){
					/* kondisi menghentikan perjalanan S jika koordinat S berada di luar peta */
					if((type == 0 && start > length-1) || (type == 1 && start > wide-1) || (type == 2 && start > wide-1)){
						start += end;
					}
					/* kondisi di mana S harus diprint, yaitu sesuai dengan tipe dan koordinat perjalanan */
					if(((type == 0) && i == start && j == x[0]) || ((type == 1 || type == 2) && j == start && i == y[0])){
						setColor(15, 0);
						printf("S");
					}else{
						setColor(code, 0);
						printf("%c", map[i][j]);
					}
					if(map[i][j-1] != ' ' && map[i][j] == ' '){ /* kondisi increment kode warna */
						code++;
						if(code > 14){
							code = 10;
						}
					}
				}
				setColor(15, 0);
				printf("|\n");
			}
			popBorder(wide);
			/*if(inc == 1){
				start++;  increment untuk melanjutkan perjalanan S 
			}else{
				start--;
			}*/
			printf("\nJalur : %s - %s\n\n", path[pathCount].firstCity, path[pathCount].secondCity);
			wait(1.0);
			system("cls");
			start++;
		}
		if(type == 2){ /* kondisi ini khusus untuk perjalanan horizontal dan vertikal */
			start = y[0] + 1;
			end = y[1];
			/* kondisi menghentikan perjalanan S jika koordinat S berada di luar peta */
			if(start > length-1){ 
				start+=end;
			}
			// inc = isInc(start, end);
			while(start <= end){
				code = 10;
				popBorder(wide);
				for(i=0; i<length; i++){
					printf("|");
					for(j=0; j<wide; j++){
						if(start > length){
							start+=end;
						}
						/* kondisi di mana S harus diprint */
						if(i == start && j == x[1]){
							setColor(15, 0);
							printf("S");
						}else{
							setColor(code, 0);
							printf("%c", map[i][j]);
						}
						if(map[i][j-1] != ' ' && map[i][j] == ' '){
							code++;
							if(code > 14){
								code = 10;
							}
						}
					}
					setColor(15, 0);
					printf("|\n");
				}
				popBorder(wide);
				/*if(inc == 1){
					start++;  increment untuk melanjutkan perjalanan S 
				}else{
					start--;
				}*/
				printf("\nJalur : %s - %s\n", path[pathCount].firstCity, path[pathCount].secondCity);
				wait(1.0);
				system("cls");
				start++;
			}
		}

		pathCount++; /* increment untuk memproses perjalanan jalur berikutnya */

	}while(pathCount < pathCounter && (start > length || start > wide));

	endOfAnimation(path, map, length, wide, x[1], y[1], pathCount-1); /* menampilkan posisi akhir S pada jalur terakhir */

}

void endOfAnimation(pType path[], char map[][512], int length, int wide, int x, int y, int n){

	int i, j;
	int code = 10;

	popBorder(wide);
	for(i=0; i<length; i++){
		printf("|");
		for(j=0; j<wide; j++){
			/* kondisi di mana S harus diprint, yaitu di koordinat akhir perjalanan */
			if(i == y && j == x){
				setColor(15, 0);
				printf("S");
			}
			else{
				setColor(code, 0);
				printf("%c", map[i][j]);
			}
			if(map[i][j-1] != ' ' && map[i][j] == ' '){ /* kondisi untuk inceremnt kode warna */
				code++;
				if(code > 14){
					code = 10;
				}
			}
		}
		setColor(15, 0);
		printf("|\n");
	}
	popBorder(wide);
	printf("\nJalur : %s - %s\n\n", path[n].firstCity, path[n].secondCity);
	EOA = 1; /* set EOA agar popMap tidak muncul dan diganti oleh prosedur endOfAnimation */
}

/*--------------------------------------------*/




/*-------------- ADDITIONAL PROCEDURES --------------*/

void wait(float x){

	time_t start;
	time_t current;
	time(&start);

	do
		time(&current);
	while(difftime(current, start) < x);

}

void setColor(int ForgC, int BackC){

     WORD wColor = ((BackC & 0x0F) << 4) + (ForgC & 0x0F);;
     SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), wColor);

}

/*int isInc(int a, int b){

	if(a < b){
		return 1;
	}
	return 0;

}*/

int noRedundant(cType city[], pType path[]){

	int i, status[2] = {0, 0};
	for(i=0; i<cityCounter; i++){
		/* kondisi jika data yang diinput user ditemukan pada file kota */
		if(strcmp(path[pathCounter].firstCity, city[i].name) == 0){
			status[0] = 1;
		}
		if(strcmp(path[pathCounter].secondCity, city[i].name) == 0){
			status[1] = 1;
		}
	}

	if(status[0] == 0 && status[1] == 0){ /* fungsi bernilai true jika tidak ada data yang ditemukan */
		return 1;
	}
	return 0;

}

int findX(cType city[], pType path[], int n){

	int i, match = 0;
	i = 0;
	/* proses mencari koordinat x kota yang ada di file kota */
	while(i<cityCounter && match == 0){
		if(strcmp(city[i].name, path[n].firstCity) == 0){
			match = 1;
		}
		i++;
	}
	return city[i-1].x; /* melempar nilai koordinat x */

}

int findY(cType city[], pType path[], int n){

	int i, match = 0;
	i = 0;
	/* proses mencari koordinat y kota yang ada di file kota */
	while(i<cityCounter && match == 0){
		if(strcmp(city[i].name, path[n].firstCity) == 0){
			match = 1;
		}
		i++;
	}
	return city[i-1].y; /* melempar nilai koordinat y */

}

/*---------------------------------------------------*/