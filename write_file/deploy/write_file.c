#include <stdio.h>
#include <fcntl.h>

char buf[0x100];

int main() {
	setvbuf(stdin, 0LL, 2, 0LL);
	setvbuf(stdout, 0LL, 2, 0LL);
	
	char filename[0x10];
	int pos;
	
	printf("Filename: ");
	scanf("%16s", filename);
	int fd = open(filename, O_RDWR);
	
	printf("Position: ");
	scanf("%d", &pos);
	lseek(fd, pos, SEEK_SET);
	
	printf("Data: ");
	read(0, buf, 0x100);
	write(fd, buf, 0x100);
}
