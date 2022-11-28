﻿using System.ComponentModel.DataAnnotations;
using System.Text.Json.Serialization;

namespace Tanyo.Portfolio.Data.Entities
{
    public class Price
    {
        [Key]
        public int ID { get; set; }

        [JsonPropertyName("value")]
        public int Value { get; set; }

        [JsonPropertyName("currency")]
        public string Currency { get; set; }

        [JsonPropertyName("type")]
        public int Type { get; set; }

        [JsonPropertyName("location")]
        public int Location { get; set; }
    }
}