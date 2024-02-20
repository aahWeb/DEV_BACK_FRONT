const students = [
    {
      name: "Alan",
      family: {
        mother: "Yvette",
        father: "Michel",
        sister: "Elise",
      },
      age: 35,
    },
    {
      name: "Bernard",
      family: {
        mother: "Martine",
        father: "Cécile",
        sister: "Sophie",
      },
      age: 55,
    },
  ];

  const studentsCopy = students.map(student => ({
    ...student,
    family: { ...student.family }, // Copie profonde de l'objet family
  }));
  
  console.log(studentsCopy);
  