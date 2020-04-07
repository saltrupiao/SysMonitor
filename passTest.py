with open('passwd.txt', 'r') as my_file:
  passwd = my_file.read().rstrip()
  print(f"X{passwd}X")
