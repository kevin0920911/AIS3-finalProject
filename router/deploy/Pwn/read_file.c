#include <stdio.h>
#include <fcntl.h>
#include <sys/mman.h>
#include <assert.h>
#include <seccomp.h>

int main(int argc, char **argv, char **envp) {
    assert(argc > 0);

    setvbuf(stdin, NULL, _IONBF, 0);
    setvbuf(stdout, NULL, _IONBF, 1);
    
    puts("Shellcode Test:");
    
    int fd = open(argv[1], O_RDONLY|O_NOFOLLOW);

    void *shellcode = mmap((void *)0x1234000, 0x1000, PROT_READ|PROT_WRITE|PROT_EXEC, MAP_PRIVATE|MAP_ANON, 0, 0);
    assert(shellcode == (void *)0x1234000);
    
    int shellcode_size = read(0, shellcode, 0x1000);

    scmp_filter_ctx ctx = seccomp_init(SCMP_ACT_KILL);
    assert(seccomp_rule_add(ctx, SCMP_ACT_ALLOW, SCMP_SYS(openat), 0) == 0);
    assert(seccomp_rule_add(ctx, SCMP_ACT_ALLOW, SCMP_SYS(sendfile), 0) == 0);
    assert(seccomp_rule_add(ctx, SCMP_ACT_ALLOW, SCMP_SYS(read), 0) == 0);
    assert(seccomp_rule_add(ctx, SCMP_ACT_ALLOW, SCMP_SYS(write), 0) == 0);


    assert(seccomp_load(ctx) == 0);

    ((void(*)())shellcode)();
}
