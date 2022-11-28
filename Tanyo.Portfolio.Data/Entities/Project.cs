﻿using System.ComponentModel.DataAnnotations;

namespace Tanyo.Portfolio.Data.Entities
{
    public class Project
    {
        [Key]
        public int ID { get; set; }

        public bool IsPrivate { get; set; }

        public string Title { get; set; }

        public string Location { get; set; }

        public string Client { get; set; }

        public string Image { get; set; }

        public string Name { get; set; }

        public string Type { get; set; }

        public int SizeLg { get; set; }

        public int SizeMd { get; set; }
    }
}