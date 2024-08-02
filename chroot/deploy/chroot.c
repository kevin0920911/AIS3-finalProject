#include <stdio.h>
#include <fcntl.h>
#include <sys/mman.h>
#include <assert.h>

int main() {
    setvbuf(stdin, NULL, _IONBF, 0);
    setvbuf(stdout, NULL, _IONBF, 1);
    
	chroot("/tmp");
	chdir("/");
    
    void *shellcode = mmap((void *)0x1234000, 0x1000, PROT_READ|PROT_WRITE|PROT_EXEC, MAP_PRIVATE|MAP_ANON, 0, 0);
    assert(shellcode == (void *)0x1234000);
    
    int shellcode_size = read(0, shellcode, 0x1000);

    ((void(*)())shellcode)();
}
